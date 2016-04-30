<?php

use Mobileka\L3\Engine\Form\Form;
use Mobileka\L3\Engine\Grid\Grid;

use Mobileka\L3\Engine\Form\Components\ActiveTag as ActiveTagForm;
use Mobileka\L3\Engine\Form\Components\Autocomplete as AutocompleteForm;
use Mobileka\L3\Engine\Form\Components\BaseComponent as BaseComponentForm;
use Mobileka\L3\Engine\Form\Components\BaseUploadComponent as BaseUploadComponentForm;
use Mobileka\L3\Engine\Form\Components\Checkbox as CheckboxForm;
use Mobileka\L3\Engine\Form\Components\CKEditor as CKEditorForm;
use Mobileka\L3\Engine\Form\Components\Datepicker as DatepickerForm;
use Mobileka\L3\Engine\Form\Components\Dropdown as DropdownForm;
use Mobileka\L3\Engine\Form\Components\DropdownAjax as DropdownAjaxForm;
use Mobileka\L3\Engine\Form\Components\DropdownChosen as DropdownChosenForm;
use Mobileka\L3\Engine\Form\Components\DropdownChosenLinked as DropdownChosenLinkedForm;
use Mobileka\L3\Engine\Form\Components\DualMultiselect as DualMultiselectForm;
use Mobileka\L3\Engine\Form\Components\Email as EmailForm;
use Mobileka\L3\Engine\Form\Components\File as FileForm;
use Mobileka\L3\Engine\Form\Components\Hidden as HiddenForm;
use Mobileka\L3\Engine\Form\Components\Image as ImageForm;
use Mobileka\L3\Engine\Form\Components\ModelsList as ModelsListForm;
use Mobileka\L3\Engine\Form\Components\MultiUpload as MultiUploadForm;
use Mobileka\L3\Engine\Form\Components\Password as PasswordForm;
use Mobileka\L3\Engine\Form\Components\Phone as PhoneForm;
use Mobileka\L3\Engine\Form\Components\Price as PriceForm;
use Mobileka\L3\Engine\Form\Components\Radio as RadioForm;
use Mobileka\L3\Engine\Form\Components\SimpleFile as SimpleFileForm;
use Mobileka\L3\Engine\Form\Components\SimpleText as SimpleTextForm;
use Mobileka\L3\Engine\Form\Components\Spinner as SpinnerForm;
use Mobileka\L3\Engine\Form\Components\Tag as TagForm;
use Mobileka\L3\Engine\Form\Components\Text as TextForm;
use Mobileka\L3\Engine\Form\Components\TextArea as TextAreaForm;
use Mobileka\L3\Engine\Form\Components\Web as WebForm;
use Mobileka\L3\Engine\Form\Components\YandexMapLocation as YandexMapLocationForm;

use Mobileka\L3\Engine\Grid\Components\ActiveDropdown as ActiveDropdownGrid;
use Mobileka\L3\Engine\Grid\Components\BaseComponent as BaseComponentGrid;
use Mobileka\L3\Engine\Grid\Components\Boolean as BooleanGrid;
use Mobileka\L3\Engine\Grid\Components\Column as ColumnGrid;
use Mobileka\L3\Engine\Grid\Components\ColumnNested as ColumnNestedGrid;
use Mobileka\L3\Engine\Grid\Components\Date as DateGrid;
use Mobileka\L3\Engine\Grid\Components\Image as ImageGrid;
use Mobileka\L3\Engine\Grid\Components\Link as LinkGrid;
use Mobileka\L3\Engine\Grid\Components\Price as PriceGrid;
use Mobileka\L3\Engine\Grid\Components\Switcher as SwitcherGrid;

use Mobileka\L3\Engine\Grid\Filters\BaseComponent as BaseComponentFilter;
use Mobileka\L3\Engine\Grid\Filters\Contains as ContainsFilter;
use Mobileka\L3\Engine\Grid\Filters\Date as DateFilter;
use Mobileka\L3\Engine\Grid\Filters\DateRange as DateRangeFilter;
use Mobileka\L3\Engine\Grid\Filters\Dropdown as DropdownFilter;
use Mobileka\L3\Engine\Grid\Filters\DropdownChosen as DropdownChosenFilter;
use Mobileka\L3\Engine\Grid\Filters\DropdownChosenLinked as DropdownChosenLinkedFilter;
use Mobileka\L3\Engine\Grid\Filters\EndsWith as EndsWithFilter;
use Mobileka\L3\Engine\Grid\Filters\StartsWith as StartsWithFilter;
use Mobileka\L3\Engine\Grid\Filters\Text as TextFilter;

$lists = array(
	'user' => IoC::resolve('UserModel')->lists('fullname', 'id'),
);

$model = IoC::resolve('ChanceModel');

IoC::register('chancesEngineForm', function () use ($model, $lists)
{
	$config = array('languageFile' => 'chances');

	if (user()->group->isReportUser)
	{
		foreach (user()->enabledFields as $fieldName)
		{
			$config['components'][$fieldName] = TextForm::make($fieldName);
		}
	}
	else
	{
		$config['components'] = array(
			'postuplenie_sl' => TextForm::make('postuplenie_sl'),
			'viplata_sl' => TextForm::make('viplata_sl'),
			'ostatok' => TextForm::make('ostatok'),
		);
	}

	$config['components']['comment'] = TextAreaForm::make('comment');
	$config['components']['date'] = DatepickerForm::make('date');

	return Form::make(
		$model,
		$config
	);
});

IoC::register('chancesEngineGrid', function () use ($model, $lists)
{
	$config = array('languageFile' => 'chances');

	if (user()->group->isReportUser)
	{
		foreach (user()->enabledFields as $fieldName)
		{
			$config['components'][$fieldName] = ColumnGrid::make($fieldName);
			$config['filters'][$fieldName] = ContainsFilter::make($fieldName);
		}
	}
	else
	{
		$config['components'] = array(
			'user_id' => ColumnGrid::make('user.fullname'),
			'postuplenie_sl' => ColumnGrid::make('postuplenie_sl'),
			'viplata_sl' => ColumnGrid::make('viplata_sl'),
			'ostatok' => ColumnGrid::make('ostatok'),
		);

		$config['filters'] = array(
			'user_id' => DropdownChosenFilter::make('user_id')->options($lists['user']),
			'postuplenie_sl' => ContainsFilter::make('postuplenie_sl'),
			'viplata_sl' => ContainsFilter::make('viplata_sl'),
			'ostatok' => ContainsFilter::make('ostatok'),
		);
	}

	$config['filters']['comment'] = ContainsFilter::make('comment');
	$config['filters']['created_at'] = DateRangeFilter::make('created_at');
	$config['filters']['date'] = DateRangeFilter::make('date');
	$config['components']['created_at'] = ColumnGrid::make('created_at');
	$config['components']['date'] = ColumnGrid::make('date');

	return Grid::make(
		$model,
		$config
	);
});

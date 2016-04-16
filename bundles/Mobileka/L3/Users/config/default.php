<?php

use Mobileka\L3\Engine\Form\Components\Text,
	Mobileka\L3\Engine\Form\Components\TextArea,
	Mobileka\L3\Engine\Form\Components\Password,
	Mobileka\L3\Engine\Form\Components\DropdownChosen,
	Mobileka\L3\Engine\Form\Components\Hidden,
	Mobileka\L3\Engine\Grid\Components\Column,
	Mobileka\L3\Engine\Grid\Filters\Contains,
	Mobileka\L3\Engine\Grid\Filters\Dropdown as DropdownFilter;

$group = IoC::resolve('UserGroupModel');
$groups = $group::lists('name', 'id');
$types = Config::get('users::types');

return array(
	'form' => array(
		'template' => 'users::form',
		'components' => array(
			'email' => Text::make('email'),
			'password' => Password::make('password'),
			'group_id' => DropdownChosen::make('group_id')->options($groups),
			'enabled_fields_json' => Hidden::make('enabled_fields_json'),
			'name' => Text::make('name'),
		),
	),

	'grid' => array(
		'components' => array(
			'email' => Column::make('email'),
			'group_id' => Column::make('group.name'),
			//'enabled_fields_json' => Column::make('enabled_fields_json'),
		),

		'filters' => array(
			'email' => Contains::make('email'),
			'name' => Contains::make('name'),
			'group_id' => DropdownFilter::make('group_id')->options($groups),
		),
	),
);

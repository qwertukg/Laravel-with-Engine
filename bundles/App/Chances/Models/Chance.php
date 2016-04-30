<?php namespace Chances\Models;

use Laravel\IoC;
use Mobileka\L3\Engine\Laravel\Base\ImageModel as BaseModel;

class Chance extends BaseModel {

	public static $table = 'chances';

	public static $reporterAccessible = array(
		'postuplenie_sl',
		'viplata_sl',
		'ostatok',
	);

	public static $accessible = array(
		'id',
		'user_id',
		'postuplenie_sl',
		'viplata_sl',
		'ostatok',
		'comment',
		'created_at',
		'updated_at',
		'date',
	);

	public static $rules = array(
		'postuplenie_sl' => 'required|numeric',
		'viplata_sl' => 'required|numeric',
		'ostatok' => 'required|numeric',
		'date' => 'required',
		//'comment' => 'required',
	);

	public function user()
	{
		return $this->belongs_to(IoC::resolve('UserModel'));
	}

	public function beforeValidation()
	{
		if (user()->group->isReportUser)
		{
			foreach (static::$rules as $fieldName => $rule)
			{
				if (!in_array($fieldName, user()->enabledFields) and $fieldName != 'date')
				{
					unset(static::$rules[$fieldName]);
				}
			}
		}

		return parent::beforeValidation();
	}

	public function beforeSave()
	{
		$this->user_id = user()->id;
		return parent::beforeSave();
	}

}

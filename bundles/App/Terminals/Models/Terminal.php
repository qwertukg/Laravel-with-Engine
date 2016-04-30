<?php namespace Terminals\Models;

use Laravel\IoC;
use Mobileka\L3\Engine\Laravel\Base\ImageModel as BaseModel;

class Terminal extends BaseModel {

	public static $table = 'terminals';

	public static $reporterAccessible = array(
		'vsego_lt',
		'ukrali',
		'remont',
		'magazin_zakrit',
		'net_sveta',
		'problrmy_u_providera',
		'perezd',
		'ostatok_po_kasse',
		'itogo_ostatok',
	);

	public static $accessible = array(
		'id',
		'user_id',
		'vsego_lt',
		'ukrali',
		'remont',
		'magazin_zakrit',
		'net_sveta',
		'problrmy_u_providera',
		'perezd',
		'ostatok_po_kasse',
		'itogo_ostatok',
		'comment',
		'created_at',
		'updated_at',
		'date',
	);

	public static $rules = array(
		'vsego_lt' => 'required|numeric',
		'ukrali' => 'required|numeric',
		'remont' => 'required|numeric',
		'magazin_zakrit' => 'required|numeric',
		'net_sveta' => 'required|numeric',
		'problrmy_u_providera' => 'required|numeric',
		'perezd' => 'required|numeric',
		'ostatok_po_kasse' => 'required|numeric',
		'itogo_ostatok' => 'required|numeric',
		'date' => 'required',
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

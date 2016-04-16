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
	);

	public static $rules = array(
		'vsego_lt' => 'required',
		'ukrali' => 'required',
		'remont' => 'required',
		'magazin_zakrit' => 'required',
		'net_sveta' => 'required',
		'problrmy_u_providera' => 'required',
		'perezd' => 'required',
		'ostatok_po_kasse' => 'required',
		'itogo_ostatok' => 'required',
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
				if (!in_array($fieldName, user()->enabledFields))
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

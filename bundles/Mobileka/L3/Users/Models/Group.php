<?php namespace Mobileka\L3\Users\Models;

use Mobileka\L3\Engine\Laravel\Base\Model;

class Group extends Model {

	public static $table = 'user_groups';

	public static $rules = array(
		'name' => 'required|unique:user_groups',
		'code' => 'required|unique:user_groups|alpha_dash'
	);

	public function users()
	{
		return $this->has_many(\IoC::resolve('UserModel'));
	}

	public function beforeValidation()
	{
		$this->code = \Str::lower(trim($this->code));
		return parent::beforeValidation();
	}

	public static function getIdByCode($code)
	{
		return static::where_code($code)->first()->id;
	}

	public function get_isReportUser()
	{
		return (strpos($this->code, 'users-') === 0);
	}

	public static function reportersJson()
	{
		$list = array();

		foreach (static::all() as $group)
		{
			if (strpos($group->code, 'users-') === 0)
			{
				$list[] = $group->name;
			}
		}

		return json_encode($list);
	}

	public function get_accessibleFields()
	{
		$model = $this->reporterModel;
		return $model::$reporterAccessible;
	}

	public function get_reporterModel()
	{
		$iocName = ucfirst(substr($this->code, 6)).'Model';
		return \IoC::resolve($iocName);
	}

	public function get_reporterLangFile()
	{
		$bundleName = substr($this->code, 6).'s';
		return $bundleName."::".$bundleName;
	}

}

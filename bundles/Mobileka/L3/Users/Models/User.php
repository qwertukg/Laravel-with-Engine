<?php namespace Mobileka\L3\Users\Models;

use Mobileka\L3\Engine\Laravel\Base\Model;

class User extends Model {

	public static $hidden = array(
		'password',
		'recovery_token',
		'recovery_password',
		'recovery_request_date'
	);

	public static $accessible = array(
		'id',
		'email',
		'password',
		'group_id',
		'name',
		'enabled_fields_json',
	);

	public static $rules = array(
		'email' => 'required|alpha_dash|unique:users',
		'password' => 'required|min:5',
		'group_id' => 'required',
	);

	public function group()
	{
		return $this->belongs_to(\IoC::resolve('UserGroupModel'));
	}

	public function get_fullname()
	{
		return $this->name ? : $this->email;
	}

	public function get_enabledFields()
	{
		return json_decode($this->enabled_fields_json);
	}

	public function beforeValidation()
	{
		if ($this->exists and $this->password === '')
		{

			$this->password = $this->original['password'];
		}

		return parent::beforeValidation();
	}

	public function afterValidation()
	{
		if ($this->changed('password') or !$this->exists)
		{
			$this->password = \Hash::make($this->password);
		}

		return parent::afterValidation();
	}
}

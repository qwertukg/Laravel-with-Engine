<?php

use Mobileka\L3\Engine\Laravel\Base\BackendController;
use Mobileka\L3\Users\FieldSet;


class Users_Admin_Default_Controller extends BackendController {

	public function __construct()
	{
		$this->model = IoC::resolve('UserModel');
		parent::__construct();
	}

	public function get_fieldset_form($groupName)
	{
		$groupName = urldecode($groupName);
		if ($this->model->exists)
		{
			$user = $this->model;
		}
		else
		{
			$user = $this->model;
			$user->enabled_fields_json = '[]';
			$user->group = \IoC::resolve('UserGroupModel')->where_name($groupName)->first();
		}

		$fieldset = new FieldSet($user);
		return $fieldset->render();
	}

}

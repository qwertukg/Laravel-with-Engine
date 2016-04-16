<?php

use Mobileka\L3\Engine\Laravel\Base\BackendController as BackendController;

class Chances_Admin_Chances_Controller extends BackendController {

	public function __construct()
	{
		parent::__construct();

		$this->layout->title = ___('chances.controllers.admin.chances.titles', static::$route['action']);
		
		$this->model = IoC::resolve('ChanceModel');

		$this->with(array(
			'user',
		));
	}

} 


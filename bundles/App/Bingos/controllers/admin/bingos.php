<?php

use Mobileka\L3\Engine\Laravel\Base\BackendController as BackendController;

class Bingos_Admin_Bingos_Controller extends BackendController {

	public function __construct()
	{
		parent::__construct();

		$this->layout->title = ___('bingos.controllers.admin.bingos.titles', static::$route['action']);
		
		$this->model = IoC::resolve('BingoModel');

		$this->with(array(
			'user',
		));
	}

} 


<?php

use Mobileka\L3\Engine\Laravel\Base\BackendController as BackendController;

class Categories_Admin_Categories_Controller extends BackendController {

	public function __construct()
	{
		parent::__construct();

		$this->layout->title = ___('categories.controllers.admin.categories.titles', static::$route['action']);
		
		$this->model = IoC::resolve('CategoryModel');

		
	}

} 


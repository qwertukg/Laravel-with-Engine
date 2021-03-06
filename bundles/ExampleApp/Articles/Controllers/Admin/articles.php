<?php

use Mobileka\L3\Engine\Laravel\Base\BackendController as BackendController;

class Articles_Admin_Articles_Controller extends BackendController {

	public function __construct()
	{
		parent::__construct();

		$this->layout->title = ___('articles.controllers.admin.articles.titles', static::$route['action']);
		
		$this->model = IoC::resolve('ArticleModel');

		$this->with(array(
			'category',
		));
	}

} 


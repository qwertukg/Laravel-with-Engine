<?php

RestfulRouter::make()
	->except('view')
	->resource(array(
		'submodule' => 'admin', 
		'bundle' => 'categories',
		'controller' => 'categories'
	));
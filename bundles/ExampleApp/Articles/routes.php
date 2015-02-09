<?php

RestfulRouter::make()
	->except('view')
	->resource(array(
		'submodule' => 'admin', 
		'bundle' => 'articles',
		'controller' => 'articles'
	));
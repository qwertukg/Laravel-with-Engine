<?php

RestfulRouter::make()
	->except('view')
	->resource(array(
		'submodule' => 'admin', 
		'bundle' => 'bingos',
		'controller' => 'bingos'
	));
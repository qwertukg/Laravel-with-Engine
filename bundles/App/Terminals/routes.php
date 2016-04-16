<?php

RestfulRouter::make()
	->except('view')
	->resource(array(
		'submodule' => 'admin', 
		'bundle' => 'terminals',
		'controller' => 'terminals'
	));
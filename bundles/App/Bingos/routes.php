<?php

if (user()->exists and user()->group->isReportUser and user()->group->reporterLangFile == 'bingos::bingos')
{
	RestfulRouter::make()
		->except('view', 'edit', 'destroy')
		->resource(array(
			'submodule' => 'admin',
			'bundle' => 'bingos',
			'controller' => 'bingos'
		));
}
elseif (user()->exists and user()->group->code == 'contents')
{
	RestfulRouter::make()
	->except('view', 'add', 'edit', 'destroy')
	->resource(array(
		'submodule' => 'admin',
		'bundle' => 'bingos',
		'controller' => 'bingos'
	));
}
else
{
	RestfulRouter::make()
	->except('view')
	->resource(array(
		'submodule' => 'admin',
		'bundle' => 'bingos',
		'controller' => 'bingos'
	));
}

<?php

if (user()->exists and user()->group->isReportUser and user()->group->reporterLangFile == 'terminals::terminals')
{
	RestfulRouter::make()
		->except('view', 'edit', 'destroy')
		->resource(array(
			'submodule' => 'admin',
			'bundle' => 'terminals',
			'controller' => 'terminals'
		));
}
elseif (user()->exists and user()->group->code == 'contents')
{
	RestfulRouter::make()
	->except('view', 'add', 'edit', 'destroy')
	->resource(array(
		'submodule' => 'admin',
		'bundle' => 'terminals',
		'controller' => 'terminals'
	));
}
else
{
	RestfulRouter::make()
		->except('view')
		->resource(array(
			'submodule' => 'admin',
			'bundle' => 'terminals',
			'controller' => 'terminals'
		));
}

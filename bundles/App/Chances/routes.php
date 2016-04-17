<?php

if (user()->exists and user()->group->isReportUser and user()->group->reporterLangFile == 'chances::chances')
{
	RestfulRouter::make()
		->except('view', 'edit', 'destroy')
		->resource(array(
			'submodule' => 'admin',
			'bundle' => 'chances',
			'controller' => 'chances'
		));
}
else
{
	RestfulRouter::make()
		->except('view')
		->resource(array(
			'submodule' => 'admin',
			'bundle' => 'chances',
			'controller' => 'chances'
		));
}

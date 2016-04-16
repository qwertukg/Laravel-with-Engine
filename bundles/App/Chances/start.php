<?php

Autoloader::namespaces(array(
	'Chances' => Bundle::path('chances')
));

IoC::register('ChanceModel', function()
{
	return new Chances\Models\Chance;
});

require 'Crud.php';

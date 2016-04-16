<?php

Autoloader::namespaces(array(
	'Terminals' => Bundle::path('terminals')
));

IoC::register('TerminalModel', function()
{
	return new Terminals\Models\Terminal;
});

require 'Crud.php';

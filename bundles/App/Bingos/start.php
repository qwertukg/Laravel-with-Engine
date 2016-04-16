<?php

Autoloader::namespaces(array(
	'Bingos' => Bundle::path('bingos')
));

IoC::register('BingoModel', function()
{
	return new Bingos\Models\Bingo;
});

require 'Crud.php';

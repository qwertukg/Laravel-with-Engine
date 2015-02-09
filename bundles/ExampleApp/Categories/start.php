<?php

Autoloader::namespaces(array(
	'Categories' => Bundle::path('categories')
));

IoC::register('CategoryModel', function()
{
	return new Categories\Models\Category;
});

require 'Crud.php';

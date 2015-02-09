<?php

Autoloader::namespaces(array(
	'Articles' => Bundle::path('articles')
));

IoC::register('ArticleModel', function()
{
	return new Articles\Models\Article;
});

require 'Crud.php';

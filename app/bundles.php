<?php

return array(

	'engine' => array('location' => 'Mobileka/L3/Engine'),
	'cook' => array('location' => 'Mobileka/L3/Cook'),
	'auth' => array('location' => 'Mobileka/L3/Auth', 'auto' => true),
	'users' => array('location' => 'Mobileka/L3/Users', 'auto' => true),

	'docs' => array('handles' => 'docs'),

	// Example Application
	
	'categories' => array('location' => 'ExampleApp/Categories', 'auto' => true),
	'articles' => array('location' => 'ExampleApp/Articles', 'auto' => true),

);
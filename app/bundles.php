<?php

return array(

	'engine' => array('location' => 'Mobileka/L3/Engine'),
	'cook' => array('location' => 'Mobileka/L3/Cook'),
	'auth' => array('location' => 'Mobileka/L3/Auth', 'auto' => true),
	'users' => array('location' => 'Mobileka/L3/Users', 'auto' => true),

	'docs' => array('handles' => 'docs'),

	// Daily Application

	'bingos' => array('location' => 'App/Bingos', 'auto' => true),
	'terminals' => array('location' => 'App/Terminals', 'auto' => true),
	'chances' => array('location' => 'App/Chances', 'auto' => true),

);

<?php

return array(
	'defaultResult' => false,

	'allowedRoutes' => array(
		'auth_admin_default_login',
		'auth_admin_default_logout',
	),

	'permissions' => array(

		'aliases' => array(
			'bingos_admin_(:any)' => array('admins', 'contents', 'users-bingo'),
			'terminals_admin_(:any)' => array('admins', 'contents', 'users-terminal'),
			'chances_admin_(:any)' => array('admins', 'contents', 'users-chance'),
			'(:any)_admin_(:any)' => array('admins', 'contents'),
			
			'admin_home' => array('admins', 'contents', 'users-bingo', 'users-terminal', 'users-chance'),
		),

		'paths' => array(),
	),

	'actions' => array(
		'upload_files_without_restrictions' => array('admins')
	),
);

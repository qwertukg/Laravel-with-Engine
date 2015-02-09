<?php

return array(
	'defaultResult' => false,

	'allowedRoutes' => array(
		'auth_admin_default_login',
		'auth_admin_default_logout',
	),

	'permissions' => array(

		'aliases' => array(
			'(:any)_admin_(:any)' => array('admins'),
			'admin_home' => array('admins'),
		),

		'paths' => array(),
	),

	'actions' => array(
		'upload_files_without_restrictions' => array('admins')
	),
);
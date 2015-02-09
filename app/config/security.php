<?php

return array(
	'admin_uri' => 'cp',
	'admin_port' => false, //restrict access to admin interface by port, false to disable
	'admin_ip' => false, //restrict access to admin interface by ip, false to disable
	'allowed_login_attempts' => 5, //0 or false to disable this limit
	'login_attempts_block_duration' => 15, //in minutes

	/*
	* if anybody doesn't use your web-application for a specefied below amount of days, his account will be deleted.
	* false to disable
	*/
	'block_period' => 365,
);
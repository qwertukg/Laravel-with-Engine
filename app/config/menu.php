<?php

return array(
	'sections' => array(
		array(
			'label' => 'Администрирование',
			'items' => array(
				array(
					'label' => 'Пользователи',
					'route' => 'users_admin_default_index', //according to routing conventions
					'icon' => 'glyphicon-user'
				),
				//...
				array(
					'label' => 'Группы',
					'route' => 'users_admin_groups_index',
					'icon' => 'glyphicon-group'
				),
			),
		),
	),
);
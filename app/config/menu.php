<?php

return array(
	'sections' => array(
		array(
			'label' => 'Администрирование',
			'items' => array(
				array(
					'label' => 'Пользователи',
					'route' => 'users_admin_default_index', //according to routing conventions
					'icon' => ''
				),
				//...
				array(
					'label' => 'Категории пользователей',
					'route' => 'users_admin_groups_index',
					'icon' => ''
				),
			),
		),
		array(
			'label' => 'Отчеты',
			'items' => array(
				array(
					'label' => 'Бинго',
					'route' => 'bingos_admin_bingos_index',
					'icon' => ''
				),
				array(
					'label' => 'Лотерейный терминал',
					'route' => 'terminals_admin_terminals_index',
					'icon' => ''
				),
				array(
					'label' => 'Шанс лото',
					'route' => 'chances_admin_chances_index',
					'icon' => ''
				),
			),
		),
	),
);

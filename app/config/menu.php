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
					'label' => 'Категории',
					'route' => 'users_admin_groups_index',
					'icon' => 'glyphicon-group'
				),
			),
		),
		array(
			'label' => 'Отчеты',
			'items' => array(
				array(
					'label' => 'Бинго',
					'route' => 'bingos_admin_bingos_index',
					'icon' => 'glyphicon-file'
				),
				array(
					'label' => 'Лотерейный терминал',
					'route' => 'terminals_admin_terminals_index',
					'icon' => 'glyphicon-file'
				),
				array(
					'label' => 'Шанс лото',
					'route' => 'chances_admin_chances_index',
					'icon' => 'glyphicon-file'
				),
			),
		),
	),
);

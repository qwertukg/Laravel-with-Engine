<?php

use Cook\Laravel\Schema;
class Terminals_Create_Terminals {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('terminals', function($t)
		{
			$t->create();
			$t->increments('id');
			$t->integer('user_id')->unsigned();

			$t->decimal('vsego_lt', 10, 2)->ru('Всего');
			$t->decimal('ukrali', 10, 2)->ru('Украли');
			$t->decimal('remont', 10, 2)->ru('Ремонт');
			$t->decimal('magazin_zakrit', 10, 2)->ru('Магазин закрыт');
			$t->decimal('net_sveta', 10, 2)->ru('Нет света');
			$t->decimal('problrmy_u_providera', 10, 2)->ru('Проблемы у провайдера');
			$t->decimal('perezd', 10, 2)->ru('Переезд');
			$t->decimal('ostatok_po_kasse', 10, 2)->ru('Остаток по кассе');
			$t->decimal('itogo_ostatok', 10, 2)->ru('Итого остаток');

			$t->text('comment');
			$t->timestamps();
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('terminals');
	}

}

<?php

use Cook\Laravel\Schema;
class Bingos_Create_Bingos {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('bingos', function($t)
		{
			$t->create();
			$t->increments('id');
			$t->integer('user_id')->unsigned();

			$t->decimal('inkassatziya_kupirnik', 10, 2)->ru('Инкассация по купюрнику');
			$t->decimal('inkassatziya_kupirnik_b1', 10, 2)->ru('Инкассация по купюрнику Бинго 1');
			$t->decimal('inkassatziya_kupirnik_b2', 10, 2)->ru('Инкассация по купюрнику Бинго 2');
			$t->decimal('postuplenie_kassa_bingo', 10, 2)->ru('Поступление по кассе Бинго');
			$t->decimal('postuplenie_kassa_ps', 10, 2)->ru('Поступление по кассе Покерный Стол');
			$t->decimal('viplata_kassa_bingo', 10, 2)->ru('Выплата по кассе Бинго');
			$t->decimal('viplata_kassa_ps', 10, 2)->ru('Выплата по кассе Покерный Стол');
			$t->decimal('ostatok_po_kasse', 10, 2)->ru('Остаток по кассе');

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
		Schema::drop('bingos');
	}

}

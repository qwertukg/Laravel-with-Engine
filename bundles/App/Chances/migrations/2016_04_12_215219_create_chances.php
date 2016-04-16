<?php

use Cook\Laravel\Schema;
class Chances_Create_Chances {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('chances', function($t)
		{
			$t->create();
			$t->increments('id');
			$t->integer('user_id')->unsigned();

			$t->decimal('postuplenie_sl', 10, 2)->ru('Поступление');
			$t->decimal('viplata_sl', 10, 2)->ru('Выплата');
			$t->decimal('ostatok', 10, 2)->ru('Итого остаток');

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
		Schema::drop('chances');
	}

}

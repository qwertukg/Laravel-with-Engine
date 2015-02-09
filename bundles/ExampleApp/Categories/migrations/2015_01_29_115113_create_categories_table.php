<?php

use Cook\Laravel\Schema;

class Categories_Create_Categories_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('categories', function($t)
		{
			$t->create();
			$t->increments('id')->ru('ID');
			$t->string('title')->ru('Заголовок');
			$t->text('description')->ru('Описание');
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
		Schema::drop('categories');
	}

}
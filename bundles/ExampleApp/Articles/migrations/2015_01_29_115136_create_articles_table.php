<?php

use Cook\Laravel\Schema;

class Articles_Create_Articles_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('articles', function($t)
		{
			$t->create();
			$t->increments('id')->ru('ID');
			$t->string('title')->ru('Заголовок');
			$t->text('content')->ru('Содержание');
			$t->integer('category_id')->ru('Категория')->unsigned();
			$t->boolean('published')->ru('Опубликовано');
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
		Schema::drop('articles');
	}

}
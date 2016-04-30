<?php

use Cook\Laravel\Schema;
class Terminals_Adds_Manual_Created_At {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('terminals', function($t)
		{
			$t->date('date')->ru('Дата');
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('terminals', function($t)
		{
			$t->drop_column('date');
		});
	}

}

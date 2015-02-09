<?php namespace Categories\Models;

use Laravel\IoC;
use Mobileka\L3\Engine\Laravel\Base\ImageModel as BaseModel;

class Category extends BaseModel {

	public static $table = 'categories';

	public static $accessible = array(
		'id',
		'title',
		'description',
		'created_at',
		'updated_at',
	);

	public static $rules = array(
		'title' => 'required',
		'description' => 'required',
	);

	

}
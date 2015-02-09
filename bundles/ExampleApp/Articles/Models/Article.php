<?php namespace Articles\Models;

use Laravel\IoC;
use Mobileka\L3\Engine\Laravel\Base\ImageModel as BaseModel;

class Article extends BaseModel {

	public static $table = 'articles';

	public static $accessible = array(
		'id',
		'title',
		'content',
		'category_id',
		'published',
		'created_at',
		'updated_at',
	);

	public static $rules = array(
		'title' => 'required',
		'content' => 'required',
		'category_id' => 'required',
		'published' => 'required',
	);

	public function category()
	{
		return $this->belongs_to(IoC::resolve('CategoryModel'));
	}

}
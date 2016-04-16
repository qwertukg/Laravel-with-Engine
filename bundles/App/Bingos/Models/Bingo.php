<?php namespace Bingos\Models;

use Laravel\IoC;
use Mobileka\L3\Engine\Laravel\Base\ImageModel as BaseModel;

class Bingo extends BaseModel {

	public static $table = 'bingos';

	public static $reporterAccessible = array(
		'inkassatziya_kupirnik',
		'inkassatziya_kupirnik_b1',
		'inkassatziya_kupirnik_b2',
		'postuplenie_kassa_bingo',
		'postuplenie_kassa_ps',
		'viplata_kassa_bingo',
		'viplata_kassa_ps',
		'ostatok_po_kasse',
	);

	public static $accessible = array(
		'id',
		'user_id',
		'inkassatziya_kupirnik',
		'inkassatziya_kupirnik_b1',
		'inkassatziya_kupirnik_b2',
		'postuplenie_kassa_bingo',
		'postuplenie_kassa_ps',
		'viplata_kassa_bingo',
		'viplata_kassa_ps',
		'ostatok_po_kasse',
		'comment',
		'created_at',
		'updated_at',
	);

	public static $rules = array(
		'inkassatziya_kupirnik' => 'required',
		'inkassatziya_kupirnik_b1' => 'required',
		'inkassatziya_kupirnik_b2' => 'required',
		'postuplenie_kassa_bingo' => 'required',
		'postuplenie_kassa_ps' => 'required',
		'viplata_kassa_bingo' => 'required',
		'viplata_kassa_ps' => 'required',
		'ostatok_po_kasse' => 'required',
		//'comment' => 'required',
	);

	public function user()
	{
		return $this->belongs_to(IoC::resolve('UserModel'));
	}

	public function beforeValidation()
	{
		if (user()->group->isReportUser)
		{
			foreach (static::$rules as $fieldName => $rule)
			{
				if (!in_array($fieldName, user()->enabledFields))
				{
					unset(static::$rules[$fieldName]);
				}
			}
		}

		return parent::beforeValidation();
	}

	public function beforeSave()
	{
		$this->user_id = user()->id;
		return parent::beforeSave();
	}

}

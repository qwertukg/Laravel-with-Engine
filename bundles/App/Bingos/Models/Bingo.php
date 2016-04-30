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
		'date',
	);

	public static $rules = array(
		'inkassatziya_kupirnik' => 'required|numeric',
		'inkassatziya_kupirnik_b1' => 'required|numeric',
		'inkassatziya_kupirnik_b2' => 'required|numeric',
		'postuplenie_kassa_bingo' => 'required|numeric',
		'postuplenie_kassa_ps' => 'required|numeric',
		'viplata_kassa_bingo' => 'required|numeric',
		'viplata_kassa_ps' => 'required|numeric',
		'ostatok_po_kasse' => 'required|numeric',
		'date' => 'required',
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
				if (!in_array($fieldName, user()->enabledFields) and $fieldName != 'date')
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

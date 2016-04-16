<?php namespace Mobileka\L3\Users;

class FieldSet {

	public $user;
	public $group;
	public $fields;
	public $accessibleFields;
	public $enabledFields;
	public $reporterLangFile;

	public function __construct(\Mobileka\L3\Users\Models\User $user)
	{
		$this->user = $user;
		$this->group = $user->group;
		$this->accessibleFields = $this->group->accessibleFields;
		$this->enabledFields = $this->user->enabledFields;
		$this->reporterLangFile = $this->group->reporterLangFile;
		$this->prepareFieldsArray();
	}

	public function prepareFieldsArray()
	{
		$this->fields = array();

		foreach ($this->accessibleFields as $fieldName)
		{
			$field = new \stdClass();
			$field->name = $fieldName;
			$field->value  = in_array($fieldName, $this->enabledFields) ? true : false;
			$field->label = formLang($this->reporterLangFile, $fieldName);
			$this->fields[] = $field;
		}
	}

	public function render()
	{
		return \Response::view('users::fieldset', array('fieldset' => $this));
	}

}

<?php

namespace common\models\content;


use common\models\Content;
use components\base\BaseModel;
use common\models\DefineTableField;
/**
 * This is the model class for table "model_news".
 *
 * @property string $content
 * @property string $source
 */
class DefaultContent extends BaseContent
{
	
	public function __construct($tableName, $isBack=true, array $attributes = [], $config = [])
	{
		$fields = DefineTableField::findAll(['table'=>$tableName]);
		$formDefault = $isBack?'back_form_default':'front_form_default';
		
		foreach ($fields as $field)
		{
			$nameEn=$field['field_name'];
		
			$this->defineAttribute($nameEn,$field[$formDefault]);
			$this->modelAttributeLabels[$nameEn] = $field['name'];
			$this->addRule($nameEn, 'safe');
		}
		
		parent::__construct($attributes,$config);
	}
	
	public function removeSpecialAtt()
	{
		$this->undefineAttribute('att');
	}
	
}

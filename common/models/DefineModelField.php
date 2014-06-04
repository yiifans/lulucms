<?php

namespace common\models;

use TS\TActiveRecord;
use components\base\BaseActiveRecord;
/**
 * This is the model class for table "yii_define_model_field".
 *
 * @property integer $id
 * @property integer $model_id
 * @property string $lable
 * @property string $name
 * @property string $type
 * @property integer $length
 * @property integer $sort_num
 * @property string $front_fun_add
 * @property string $front_fun_update
 * @property string $front_fun_show
 * @property string $front_form_type
 * @property string $front_form_option
 * @property string $front_form_default
 * @property string $front_form_html
 * @property string $back_fun_add
 * @property string $back_fun_update
 * @property string $back_fun_show
 * @property string $back_form_type
 * @property string $back_form_option
 * @property string $back_form_default
 * @property string $back_form_html
 */
class DefineModelField extends BaseActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'yii_define_model_field';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['model_id', 'lable', 'name', 'type'], 'required'],
			[['model_id', 'length', 'sort_num'], 'integer'],
			[['lable', 'name', 'type', 'front_fun_add', 'front_fun_update', 'front_fun_show', 'front_form_type', 'front_form_option', 'front_form_default', 'front_form_html', 'back_fun_add', 'back_fun_update', 'back_fun_show', 'back_form_type', 'back_form_option', 'back_form_default', 'back_form_html'], 'string', 'max' => 80]
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'model_id' => 'Model ID',
			'lable' => 'Lable',
			'name' => 'Name',
			'type' => 'Type',
			'length' => 'Length',
			'sort_num' => 'Sort Num',
			'front_fun_add' => 'Front Fun Add',
			'front_fun_update' => 'Front Fun Update',
			'front_fun_show' => 'Front Fun Show',
			'front_form_type' => 'Front Form Type',
			'front_form_option' => 'Front Form Option',
			'front_form_default' => 'Front Form Default',
			'front_form_html' => 'Front Form Html',
			'back_fun_add' => 'Back Fun Add',
			'back_fun_update' => 'Back Fun Update',
			'back_fun_show' => 'Back Fun Show',
			'back_form_type' => 'Back Form Type',
			'back_form_option' => 'Back Form Option',
			'back_form_default' => 'Back Form Default',
			'back_form_html' => 'Back Form Html',
		];
	}
}

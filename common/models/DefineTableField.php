<?php

namespace common\models;

use TS\TActiveRecord;
use components\base\BaseActiveRecord;
/**
 * This is the model class for table "yii_define_table_field".
 *
 * @property integer $id
 * @property integer $table_id
 * @property string $name
 * @property string $name_en
 * @property string $type
 * @property integer $length
 * @property integer $sort_num
 * @property string $note
 */
class DefineTableField extends BaseActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'yii_define_table_field';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['table_id', 'name','name_en', 'type'], 'required'],
			[['table_id', 'length', 'sort_num'], 'integer'],
			[['name', 'name_en', 'type'], 'string', 'max' => 80],
			[['note'], 'string', 'max' => 200]
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'table_id' => 'Table ID',
			'name' => 'Name',
			'name_en' => 'Name_en',
			'type' => 'Type',
			'length' => 'Length',
			'sort_num' => 'Sort Num',
			'note' => 'Note',
		];
	}
}

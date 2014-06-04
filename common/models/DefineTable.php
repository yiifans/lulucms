<?php

namespace common\models;

use TS\TActiveRecord;
use components\base\BaseActiveRecord;
/**
 * This is the model class for table "yii_define_table".
 *
 * @property integer $id
 * @property string $name_en
 * @property string $name
 * @property string $description
 * @property string $note
 */
class DefineTable extends BaseActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'yii_define_table';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['name_en', 'name'], 'required'],
			[['name_en', 'name', 'description', 'note'], 'string', 'max' => 80]
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'name_en' => 'Name En',
			'name' => 'Name',
			'description' => 'Description',
			'note' => 'Note',
		];
	}
}

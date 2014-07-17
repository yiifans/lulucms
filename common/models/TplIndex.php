<?php

namespace common\models;

use TS\TActiveRecord;
use components\base\BaseActiveRecord;
/**
 * This is the model class for table "yii_tpl_index".
 *
 * @property integer $id
 * @property string $name
 * @property string $file_path
 * @property string $file_name
 * @property string $file_content
 * @property string $create_time
 * @property string $modify_time
 * @property boolean $is_enable
 * @property string $note
 */
class TplIndex extends BaseActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'yii_tpl_index';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['name', 'file_path', 'file_name', 'is_enable'], 'required'],
			[['create_time', 'modify_time'], 'safe'],
			[['is_enable'], 'boolean'],
			[['name', 'file_path', 'file_name', 'note'], 'string', 'max' => 80],
			[['file_content'], 'string']
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'name' => 'Name',
			'file_path' => 'File Path',
			'file_name' => 'File Name',
			'file_content' => 'File Content',
			'create_time' => 'Create Time',
			'modify_time' => 'Modify Time',
			'is_enable' => 'Is Enable',
			'note' => 'Note',
		];
	}
}

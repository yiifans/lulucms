<?php

namespace common\models;

use components\base\BaseActiveRecord;
/**
 * This is the model class for table "yii_tpl_item".
 *
 * @property integer $id
 * @property integer $category_id
 * @property integer $model_id
 * @property string $name
 * @property string $file_path
 * @property string $file_name
 * @property string $file_content
 * @property string $create_time
 * @property string $modify_time
 * @property string $note
 */
class TplItem extends BaseActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'yii_tpl_item';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['category_id', 'model_id', 'name', 'file_path', 'file_name'], 'required'],
			[['category_id', 'model_id'], 'integer'],
			[['create_time', 'modify_time'], 'safe'],
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
			'category_id' => 'Category ID',
			'model_id' => 'Model ID',
			'name' => 'Name',
			'file_path' => 'File Path',
			'file_name' => 'File Name',
			'file_content' => 'File Content',
			'create_time' => 'Create Time',
			'modify_time' => 'Modify Time',
			'note' => 'Note',
		];
	}
}

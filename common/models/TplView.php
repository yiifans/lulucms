<?php

namespace common\models;

use TS\TActiveRecord;
use components\base\BaseActiveRecord;
/**
 * This is the model class for table "yii_tpl_view".
 *
 * @property integer $id
 * @property integer $category_id
 * @property integer $table_id
 * @property string $name
 * @property string $file_path
 * @property string $file_name
 * @property string $file_content
 * @property string $create_time
 * @property string $modify_time
 * @property string $note
 */
class TplView extends BaseActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'yii_tpl_view';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['category_id', 'table_id', 'name', 'file_path', 'file_name'], 'required'],
			[['category_id', 'table_id'], 'integer'],
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
			'table_id' => 'Table ID',
			'name' => 'Name',
			'file_path' => 'File Path',
			'file_name' => 'File Name',
			'file_content' => 'File Content',
			'create_time' => 'Create Time',
			'modify_time' => 'Modify Time',
			'note' => 'Note',
		];
	}
	
private $table_name;
	public function settable_name($value)
	{
		$this->table_name=$value;
	}
	public function gettable_name()
	{
		return $this->table_name;
	}
}

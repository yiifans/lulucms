<?php

namespace common\models;

use TS\TActiveRecord;
use components\base\BaseActiveRecord;
/**
 * This is the model class for table "yii_define_model".
 *
 * @property integer $id
 * @property integer $table_id
 * @property string $table_name
 * @property string $name
 * @property string $alias
 * @property boolean $is_enable
 * @property boolean $is_nav
 * @property integer $sort_num
 * @property string $tpl_front_form
 * @property string $tpl_back_form
 * @property string $note
 */
class DefineModel extends BaseActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'yii_define_model';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['table_id', 'name'], 'required'],
			[['table_id', 'sort_num'], 'integer'],
			[['is_enable', 'is_nav'], 'boolean'],
			[['name', 'alias', 'note'], 'string', 'max' => 80],
			[['tpl_front_form', 'tpl_back_form'], 'string', 'max' => 2000]
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
			'table_name' => 'Table Name',
			'name' => 'Name',
			'alias' => 'Alias',
			'is_enable' => 'Is Enable',
			'is_nav' => 'Is Nav',
			'sort_num' => 'Sort Num',
			'tpl_front_form' => 'Front Form Template',
			'tpl_back_form' => 'Back Form Template',
			'note' => 'Note',
		];
	}
	
}

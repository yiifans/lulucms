<?php

namespace common\models;

use TS\TActiveRecord;
use components\base\BaseActiveRecord;
/**
 * This is the model class for table "yii_define_table".
 *
 * @property string $name_en
 * @property string $name
 * @property string $description
 * @property boolean $is_default
 * @property string $channel_tpl
 * @property string $list_tpl
 * @property string $detail_tpl
 * @property string $back_form_tpl
 * @property string $front_form_tpl
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
			[['is_default'], 'boolean'],
			[['name_en', 'name', 'description', 'note'], 'string', 'max' => 80],
			[['channel_tpl', 'list_tpl', 'detail_tpl', 'back_form_tpl', 'front_form_tpl'], 'string', 'max' => 64],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'name_en' => '标识',
			'name' => '名称',
			'description' => '简介',
			'is_default' => '默认表',
			'channel_tpl' => '频道页模板',
			'list_tpl' => '列表页模板',
			'detail_tpl' => '内容页模板',
			'back_form_tpl' => '后台表单模板',
			'front_form_tpl' => '前台表单模板',
			'note' => 'Note',
		];
	}
}

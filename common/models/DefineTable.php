<?php

namespace common\models;


use components\base\BaseActiveRecord;
use components\helpers\TStringHelper;
use components\helpers\TFileHelper;
use components\LuLu;

/**
 * This is the model class for table "yii_define_table".
 *
 * @property string $table_name
 * @property string $name
 * @property boolean $is_default
 * @property string $back_action_custom
 * @property string $front_action_custom
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
            [['name', 'table_name'], 'required'],
            [['name', 'table_name'], 'string', 'max' => 64],
            [['note'], 'string', 'max' => 80],
            [['is_default'], 'boolean'],
            [['back_action_custom', 'front_action_custom'], 'string', 'max' => 512],
            [['table_name'], 'unique']
        ];
    }

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'table_name' => '表名称',
			'name' => '名称',
			'is_default' => '默认表',
            'back_action_custom' => '后台自定义Action',
            'front_action_custom' => '前台自定义Action',
            'note' => '备注',
		];
	}
	
	public function beforeSave($insert)
	{
		if(parent::beforeSave($insert))
		{
			if($this->is_default)
			{
				DefineTable::updateAll(['is_default'=>0]);
			}
			return true;
		}
		return false;
	}
	
	public static function getBackActions($cachedTable)
	{
		return self::getActions($cachedTable,'back');
	}
	public static function getFrontActions($cachedTable)
	{
		return self::getActions($cachedTable,'front');
	}
	private static function getActions($table, $type='back')
	{
		$ret = [];
		
		if(!empty($table[$type.'_action_custom']))
		{
			$tableName  =$table['table_name'];
			
			$customActions = TStringHelper::parse2Array($table[$type.'_action_custom']);
			if(!empty($customActions))
			{
				foreach ($customActions as $id=>$action)
				{
					$ret[$id]=$type.'end\actions\content\\'.$tableName.'\\'.$action;
				}
			}
		}
		
		return $ret;
	}
}

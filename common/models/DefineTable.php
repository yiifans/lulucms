<?php

namespace common\models;


use components\base\BaseActiveRecord;
use components\helpers\TStringHelper;
use components\helpers\TFileHelper;
use components\LuLu;

/**
 * This is the model class for table "yii_define_table".
 *
 * @property string $name
 * @property string $name_en
 * @property string $description
 * @property integer $is_default
 * @property boolean $back_action_index
 * @property boolean $back_action_create
 * @property boolean $back_action_update
 * @property boolean $back_action_delete
 * @property boolean $back_action_other
 * @property string $back_action_custom
 * @property boolean $front_action_channel
 * @property boolean $front_action_list
 * @property boolean $front_action_detail
 * @property boolean $front_action_search
 * @property boolean $front_action_index
 * @property boolean $front_action_create
 * @property boolean $front_action_update
 * @property boolean $front_action_delete
 * @property boolean $front_action_other
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
            [['name', 'name_en'], 'required'],
            [['is_default'], 'integer'],
            [['name', 'name_en', 'description', 'note'], 'string', 'max' => 80],
            [['back_action_index', 'back_action_create', 'back_action_update', 'back_action_delete', 'back_action_other', 'front_action_channel', 'front_action_list', 'front_action_detail','front_action_search',  'front_action_index', 'front_action_create', 'front_action_update', 'front_action_delete', 'front_action_other'], 'boolean'],
            [['back_action_custom', 'front_action_custom'], 'string', 'max' => 512],
            [['name_en'], 'unique']
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
            'back_action_index' => '管理信息Action',
            'back_action_create' => '添加信息Action',
            'back_action_update' => '修改信息Action',
            'back_action_delete' => '删除信息Action',
            'back_action_other' => '其它Action',
            'back_action_custom' => '自定义Action',
            'front_action_channel' => '频道首页Action',
            'front_action_list' => '列表信息Action',
            'front_action_detail' => '显示信息Action',
            'front_action_search' => '搜索信息Action',
            'front_action_index' => '管理信息Action',
            'front_action_create' => '添加信息Action',
            'front_action_update' => '修改信息Action',
            'front_action_delete' => '删除信息Action',
            'front_action_other' => '其它Action',
            'front_action_custom' => '自定义Action',
            'note' => '备注',
		];
	}
	
	
	
	public function getBackActions()
	{
		return $this->getActions($this,'back');
	}
	public function getFrontActions()
	{
		return $this->getActions($this,'front');
	}
	
	private static function getActionItem($table,$type,$actionId,$action)
	{
		$tableName  =$table['name_en'];
		
		if($table[$type.'_action_'.$actionId])
		{
			return $type.'end\actions\content\\'.$tableName.'\\'.$action;
		}
		else
		{
			return $type.'end\actions\content\model_default\\'.$action;
		}
	}
	
	public static function getActions($table, $type='back')
	{
		$ret = [];
		
		$tableName  =$table['name_en'];
		
		$ret['index'] = DefineTable::getActionItem($table,$type,'index','IndexAction');
		$ret['create'] = DefineTable::getActionItem($table,$type,'create','CreateAction');
		$ret['update'] = DefineTable::getActionItem($table,$type,'update','UpdateAction');
		$ret['delete'] = DefineTable::getActionItem($table,$type,'delete','DeleteAction');
		$ret['other'] = DefineTable::getActionItem($table,$type,'other','OtherAction');
	
		if($type == 'front')
		{
			$ret['channel'] = DefineTable::getActionItem($table,$type,'channel','ChannelAction');
			$ret['list'] = DefineTable::getActionItem($table,$type,'list','ListAction');
			$ret['detail'] = DefineTable::getActionItem($table,$type,'detail','DetailAction');
			$ret['search'] = DefineTable::getActionItem($table,$type,'search','SearchAction');
		}
		
		if(!empty($table[$type.'_action_custom']))
		{
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
	
	public static function getAllTables()
	{
		return LuLu::getAppParam('cachedTables');
	}
}

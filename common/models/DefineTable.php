<?php

namespace common\models;


use components\base\BaseActiveRecord;
use components\helpers\TStringHelper;
use components\helpers\TFileHelper;

/**
 * This is the model class for table "yii_define_table".
 *
 * @property string $name
 * @property string $name_en
 * @property string $description
 * @property integer $is_default
 * @property string $back_action_manager
 * @property string $back_action_create
 * @property string $back_action_update
 * @property string $back_action_delete
 * @property string $back_action_other
 * @property string $back_action_custom
 * @property string $front_action_channel
 * @property string $front_action_list
 * @property string $front_action_detail
 * @property string $front_action_search
 * @property string $front_action_manager
 * @property string $front_action_create
 * @property string $front_action_update
 * @property string $front_action_delete
 * @property string $front_action_other
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
            [['back_action_manager', 'back_action_create', 'back_action_update', 'back_action_delete', 'back_action_other', 'front_action_channel', 'front_action_list', 'front_action_detail','front_action_search',  'front_action_manager', 'front_action_create', 'front_action_update', 'front_action_delete', 'front_action_other'], 'string', 'max' => 64],
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
            'back_action_manager' => '管理信息Action',
            'back_action_create' => '添加信息Action',
            'back_action_update' => '修改信息Action',
            'back_action_delete' => '删除信息Action',
            'back_action_other' => '其它Action',
            'back_action_custom' => '自定义Action',
            'front_action_channel' => '频道首页Action',
            'front_action_list' => '列表信息Action',
            'front_action_detail' => '显示信息Action',
            'front_action_search' => '搜索信息Action',
            'front_action_manager' => '管理信息Action',
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
	
	
	public static function getActions($table, $type='back')
	{
		$ret = [];
		
		$tableName  =$table['name_en'];
		
		if(!empty($table[$type.'_action_manager']))
		{
			$ret['manager']=$type.'end\actions\content\\'.$tableName.'\\'.$table[$type.'_action_manager'];
		}
		else 
		{
			$ret['manager']=$type.'end\actions\content\model_default\ManagerAction';
		}
		
		if(!empty($table[$type.'_action_create']))
		{
			$ret['create']=$type.'end\actions\content\\'.$tableName.'\\'.$table[$type.'_action_create'];
		}
		else
		{
			$ret['create']=$type.'end\actions\content\model_default\CreateAction';
		}
		
		if(!empty($table[$type.'_action_update']))
		{
			$ret['update']=$type.'end\actions\content\\'.$tableName.'\\'.$table[$type.'_action_update'];
		}
		else
		{
			$ret['update']=$type.'end\actions\content\model_default\UpdateAction';
		}
		
		if(!empty($table[$type.'_action_delete']))
		{
			$ret['delete']=$type.'end\actions\content\\'.$tableName.'\\'.$table[$type.'_action_delete'];
		}
		else
		{
			$ret['delete']=$type.'end\actions\content\model_default\DeleteAction';
		}
		
		if(!empty($table[$type.'_action_other']))
		{
			$ret['other']=$type.'end\actions\content\\'.$tableName.'\\'.$table[$type.'_action_other'];
		}
		else
		{
			$ret['other']=$type.'end\actions\content\model_default\OtherAction';
		}
		
		if($type == 'front')
		{
			if(!empty($table[$type.'_action_channel']))
			{
				$ret['channel']=$type.'end\actions\content\\'.$tableName.'\\'.$table[$type.'_action_channel'];
			}
			else
			{
				$ret['channel']=$type.'end\actions\content\model_default\ChannelAction';
			}
			
			if(!empty($table[$type.'_action_list']))
			{
				$ret['list']=$type.'end\actions\content\\'.$tableName.'\\'.$table[$type.'_action_list'];
			}
			else
			{
				$ret['list']=$type.'end\actions\content\model_default\ListAction';
			}
			
			if(!empty($table[$type.'_action_detail']))
			{
				$ret['detail']=$type.'end\actions\content\\'.$tableName.'\\'.$table[$type.'_action_detail'];
			}
			else
			{
				$ret['detail']=$type.'end\actions\content\model_default\DetailAction';
			}
			
			if(!empty($table[$type.'_action_search']))
			{
				$ret['search']=$type.'end\actions\content\\'.$tableName.'\\'.$table[$type.'_action_search'];
			}
			else
			{
				$ret['search']=$type.'end\actions\content\model_default\SearchAction';
			}
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
}

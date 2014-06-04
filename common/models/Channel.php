<?php

namespace common\models;

use TS\TActiveRecord;
use components\base\BaseActiveRecord;
/**
 * This is the model class for table "yii_channel".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property string $parent_ids
 * @property string $child_ids
 * @property string $leaf_ids
 * @property string $name
 * @property string $name_alias
 * @property string $name_url
 * @property string $redirect_url
 * @property integer $level
 * @property boolean $is_leaf
 * @property boolean $is_nav
 * @property integer $sort_num
 * @property integer $table_id
 * @property string $table_name
 * @property integer $tpl_channel
 * @property integer $tpl_list
 * @property integer $tpl_view
 * @property integer $page_size
 * @property string $note
 * @property string $note2
 */
class Channel extends BaseActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'yii_channel';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['parent_id', 'name'], 'required'],
			[['parent_id', 'level', 'sort_num', 'table_id', 'tpl_channel', 'tpl_list', 'tpl_view', 'page_size'], 'integer'],
			[['is_leaf', 'is_nav'], 'boolean'],
			[['parent_ids', 'child_ids', 'leaf_ids'], 'string', 'max' => 2000],
			[['name', 'name_alias', 'name_url', 'redirect_url'], 'string', 'max' => 120],
			[['table_name', 'note', 'note2'], 'string', 'max' => 80]
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'parent_id' => 'Parent ID',
			'parent_ids' => 'Parent IDs',
			'child_ids' => 'Child IDs',
			'leaf_ids' => 'Leaf IDs',
			'name' => 'Name',
			'name_alias' => 'Name Alias',
			'name_url' => 'Name Url',
			'redirect_url' => 'Redirect Url',
			'level' => 'Level',
			'is_leaf' => 'Is Leaf',
			'is_nav' => 'Is Nav',
			'sort_num' => 'Sort Num',
			'table_id' => 'Table ID',
			'table_name' => 'Table Name',
			'tpl_channel' => 'Channel Tpl',
			'tpl_list' => 'List Tpl',
			'tpl_view' => 'View Tpl',
			'page_size' => 'Page Size',
			'note' => 'Note',
			'note2' => 'Note2',
		];
	}
	
	public static function  getChannelTree($parentId=0,$level=0)
	{
		$ret=[];
	
		$query=Channel::find();
		$dataList=$query->where(['parent_id'=>$parentId])->all();
	
		//$dataList=Catalog::find(['parent_id'=>$parentId]);
		if($dataList==null){
			return $ret;
		}
		//
	
		foreach ($dataList as $key=>$value){
			$value->level=$level;
			array_push($ret, $value);
			
			$temp=self::getChannelTree($value['id'],$level+1);
			$ret=array_merge($ret,$temp);
		}
		return $ret;
	}
}

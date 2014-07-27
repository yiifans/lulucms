<?php

namespace common\models;

use TS\TActiveRecord;
use components\base\BaseActiveRecord;
use components\helpers\TFileHelper;
use components\LuLu;
/**
 * This is the model class for table "yii_channel".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property string $name
 * @property string $name_alias
 * @property string $name_url
 * @property string $redirect_url
 * @property boolean $is_leaf
 * @property boolean $is_nav
 * @property integer $sort_num
 * @property string $table
 * @property string $channel_tpl
 * @property string $list_tpl
 * @property string $detail_tpl
 * @property integer $page_size
 * @property string $note
 * @property string $seo_title
 * @property string $seo_keywords
 * @property string $seo_description
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
			[['parent_id', 'sort_num', 'page_size'], 'integer'],
			[['is_leaf', 'is_nav'], 'boolean'],
			[['name', 'name_alias', 'name_url', 'redirect_url'], 'string', 'max' => 120],
			[['table', 'note'], 'string', 'max' => 80],
			[['channel_tpl', 'list_tpl', 'detail_tpl'], 'string', 'max' => 64],
			[['seo_title', 'seo_keywords', 'seo_description'], 'string', 'max' => 256],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => '编号',
			'parent_id' => '父编号',
			'name' => '名称',
			'name_alias' => '别名',
			'name_url' => 'Url',
			'redirect_url' => '转向连接',
			'is_leaf' => '叶子结点',
			'is_nav' => '显示到导航',
			'sort_num' => '排序',
			'table' => '模型',
			'channel_tpl' => '频道页模板',
			'list_tpl' => '列表页模板',
			'detail_tpl' => '内容页模板',
			'page_size' => '每页大小',
			'note' => '备注',
			'seo_title'=> 'SEO 标题', 'seo_keywords' => 'SEO 关键字', 'seo_description' => 'SEO 描述'];
	}

	private $_level;

	public function getLevel()
	{
		return $this->_level;
	}

	public function setLevel($value)
	{
		$this->_level = $value;
	}

	public static function getRootChannels()
	{
		$ret = [];
		$cachedChannels = LuLu::getAppParam('cachedChannels');
		foreach($cachedChannels as $channel)
		{
			if($channel['parent_id'] === 0)
			{
				$ret[$channel['id']] = $channel;
			}
		}
		return $ret;
	}

	public static function getChannelArrayTree()
	{
		$cachedChannels = LuLu::getAppParam('cachedChannels');
		return $cachedChannels;
	}

	public static function _getChannelArrayTree($parentId = 0, $level = 0)
	{
		$ret = [];
		
		$dataList = Channel::findAll(['parent_id' => $parentId], 'sort_num desc');
		
		if($dataList == null || empty($dataList))
		{
			return $ret;
		}
		
		foreach($dataList as $key => $value)
		{
			$value->level = $level;
			$ret[] = $value;
			
			$temp = self::_getChannelArrayTree($value['id'], $level + 1);
			$ret = array_merge($ret, $temp);
		}
		return $ret;
	}

	public static function getParentIds($id)
	{
		$ret = [];
		
		$current = Channel::findOne(['id' => $id]);
		
		$parent = Channel::findOne(['id' => $current['parent_id']]);
		while($parent != null)
		{
			array_unshift($ret, $parent->id);
			
			$parent = Channel::findOne(['id' => $parent['parent_id']]);
		}
		array_unshift($ret, 0);
		return $ret;
	}

	public static function getChildrenIds($id)
	{
		$ret = [];
		
		$children = Channel::findAll(['parent_id' => $id]);
		foreach($children as $child)
		{
			$ret[] = $child['id'];
		}
		return $ret;
	}

	public static function getLeafIds($id)
	{
		$ret = [];
		
		$current = Channel::findOne(['id' => $id]);
		
		if($current['is_leaf'])
		{
			$ret[] = $id;
			return $ret;
		}
		
		$children = Channel::findAll(['parent_id' => $id]);
		if(count($children) > 0)
		{
			foreach($children as $child)
			{
				$temp = Channel::getLeafIds($child['id']);
				$ret= array_merge($ret,$temp);
			}
		}
		return $ret;
	}
	

	

	
	
}

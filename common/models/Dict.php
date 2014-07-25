<?php

namespace common\models;

use Yii;
use components\LuLu;

/**
 * This is the model class for table "yii_dict".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property string $name
 * @property string $value
 * @property string $category_id
 * @property integer $sort_num
 */
class Dict extends \components\base\BaseActiveRecord
{
	private $defaultSort='sort_num asc';
	
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'yii_dict';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id', 'category_id', 'name'], 'required'],
            [['parent_id', 'sort_num'], 'integer'],
            [['category_id', 'name'], 'string', 'max' => 64],
            [['value'], 'string', 'max' => 1024],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '编号',
            'parent_id' => '父级',
            'name' => '名称',
            'value' => '值',
            'category_id' => '分类Key',
            'sort_num' => '排序'];
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

	

	public static function getParents($id, $fromCache = true)
	{
		$ret = [];
		
		$current = Dict::findOne(['id' => $id]);
		if($current === null)
		{
			return $ret;
		}
		array_unshift($ret, $current);
		
		$parent = Dict::findOne(['id' => $current['parent_id']]);
		while($parent != null)
		{
			array_unshift($ret, $parent);
			
			$parent = Dict::findOne(['id' => $parent['parent_id']]);
		}
		
		return $ret;
	}
	public static function getChildren($categoryId, $id)
	{
		return Dict::findAll(['category_id' => $categoryId, 'parent_id' => $id], 'sort_num asc');
	}
	public static function getChildrenIds($id)
	{
		$ret = [];
		
		$children = Dict::findAll(['parent_id' => $id],'sort_num asc');
		foreach($children as $child)
		{
			$ret[] = $child['id'];
		}
		return $ret;
	}

	public static function _getDictArrayTree($categoryId, $parentId = 0, $level = 0)
	{
		$ret = [];
		
		$dataList = Dict::findAll(['category_id' => $categoryId, 'parent_id' => $parentId], 'sort_num asc');
		
		if($dataList == null || empty($dataList))
		{
			return $ret;
		}
		
		foreach($dataList as $key => $value)
		{
			$value->level = $level;
			$ret[] = $value;
			
			$temp = self::_getDictArrayTree($categoryId, $value['id'], $level + 1);
			$ret = array_merge($ret, $temp);
		}
    	return $ret;
    }
}

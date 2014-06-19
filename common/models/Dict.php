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
 * @property string $datatype
 * @property string $cache_key
 * @property boolean $is_sys
 * @property integer $sort_num
 */
class Dict extends \components\base\BaseActiveRecord
{
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
            [['parent_id', 'cache_key', 'name'], 'required'],
            [['parent_id', 'sort_num'], 'integer'],
            [['cache_key', 'name'], 'string', 'max' => 64],
            [['value'], 'string', 'max' => 1024],
            [['datatype'], 'string', 'max' => 32],
            [['is_sys'], 'boolean'],
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
            'datatype' => '数据类型',
            'cache_key' => '缓存Key',
            'is_sys' => '是否系统字典',
            'sort_num' => '排序',
            
        ];
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
    
    public function beforeSave($insert)
    {
    	if(parent::beforeSave($insert))
    	{
    		if(!is_int($this->sort_num))
    		{
    			$this->sort_num=0;
    		}
    		if(!is_bool($this->is_sys))
    		{
    			$this->is_sys=false;
    		}
    		
    		return true;
    	}
    	return false;
    }
    public static function getChannelArrayTree()
    {
    	$cachedChannels = LuLu::getAppParam('cachedChannels');
    	return $cachedChannels;
    }
    
    public static function _getDictArrayTree($parentId = 0, $level = 0)
    {
    	$ret = [];
    
    	$dataList = Dict::findAll([
    			'parent_id' => $parentId
    			], 'sort_num desc');
    
    	if ($dataList == null || empty($dataList))
    	{
    		return $ret;
    	}
    
    	foreach ( $dataList as $key => $value )
    	{
    		$value->level = $level;
    		$ret[] = $value;
    			
    		$temp = self::_getDictArrayTree($value['id'], $level + 1);
    		$ret = array_merge($ret, $temp);
    	}
    	return $ret;
    }
}

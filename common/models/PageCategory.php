<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "yii_page_category".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $sort_num
 */
class PageCategory extends \components\base\BaseActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'yii_page_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['sort_num'], 'integer'],
            [['name'], 'string', 'max' => 64],
            [['description'], 'string', 'max' => 128]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '编号',
            'name' => '名称',
            'description' => '简介',
            'sort_num' => '排序',
        ];
    }
    public function beforeSave($insert)
    {
    	if(parent::beforeSave($insert))
    	{
    		if(!is_int($this->sort_num))
    		{
    			$this->sort_num=0;
    		}
    		
    		return true;
    	}
    	return false;
    }
    
    public static function getAllCategories()
    {
    	$ret = [];
    	$ret['0']='无';
    	
    	$categories = PageCategory::findAll();
    	foreach ($categories as $category)
    	{
    		$ret[$category['id']]=$category['name'];
    	}
    	
    	return $ret;
    }
}

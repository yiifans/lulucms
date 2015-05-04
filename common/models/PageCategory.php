<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "yii_page_category".
 *
 * @property integer $id
 * @property string $name
 * @property string $note
 * @property string $seo_title
 * @property string $seo_keywords
 * @property string $seo_description
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
            [['note', 'seo_title', 'seo_keywords', 'seo_description'], 'string', 'max' => 128]
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
            'note' => '备注',
            'seo_title' => 'SEO 标题',
            'seo_keywords' => 'SEO 关键字',
            'seo_description' => 'SEO 描述',
            'sort_num' => '排序',
        ];
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

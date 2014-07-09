<?php

namespace common\models;

use Yii;
use components\helpers\TTimeHelper;

/**
 * This is the model class for table "yii_page".
 *
 * @property integer $id
 * @property integer $category_id
 * @property string $publish_time
 * @property string $modify_time
 * @property integer $status
 * @property string $title
 * @property string $title_format
 * @property string $title_pic
 * @property string $summary
 * @property string $body
 * @property string $tpl
 * @property string $seo_title
 * @property string $seo_keywords
 * @property string $seo_description
 * @property integer $sort_num
 */
class Page extends \components\base\BaseActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'yii_page';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'publish_time', 'status', 'title', 'body'], 'required'],
            [['category_id', 'status', 'sort_num'], 'integer'],
            [['publish_time', 'modify_time'], 'safe'],
            [['body'], 'string'],
            [['title', 'title_format', 'title_pic', 'seo_title', 'seo_keywords', 'seo_description'], 'string', 'max' => 128],
            [['summary'], 'string', 'max' => 512],
            [['tpl'], 'string', 'max' => 64]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => '分类',
            'publish_time' => '发布时间',
            'modify_time' => '修改时间',
            'status' => '状态',
            'title' => '标题',
            'title_format' => '标题格式',
            'title_pic' => '标题图片',
            'summary' => '简介',
            'body' => '内容',
            'tpl' => '模板',
            'seo_title' => 'SEO 标题',
            'seo_keywords' => 'Seo 关键字',
            'seo_description' => 'Seo 描述',
            'sort_num' => '排序',
        ];
    }
   
    public function beforeValidate()
    {
    	if(parent::beforeValidate())
    	{
    		if(!is_int($this->sort_num))
    		{
    			$this->sort_num=0;
    		}
    		$this->publish_time=TTimeHelper::getCurrentTime();
    		$this->modify_time=TTimeHelper::getCurrentTime();
    		
    		return true;
    	}
    	return false;
    }
    public function beforeSave($insert)
    {
    	if(parent::beforeSave($insert))
    	{
    		
    		
    		return true;
    	}
    	return false;
    }
}

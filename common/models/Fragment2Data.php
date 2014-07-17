<?php

namespace common\models;

use Yii;
use common\includes\CommonUtility;
use components\LuLu;

/**
 * This is the model class for table "yii_fragment2_data".
 *
 * @property integer $id
 * @property integer $fragment_id
 * @property string $title
 * @property string $title_format
 * @property string $title_pic
 * @property string $url
 * @property string $sub_title
 * @property string $summary
 * @property string $publish_time
 * @property integer $sort_num
 */
class Fragment2Data extends FragmentData
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'yii_fragment2_data';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fragment_id', 'title', 'publish_time'], 'required'],
            [['fragment_id', 'sort_num'], 'integer'],
            [['publish_time'], 'safe'],
            [['title', 'title_format', 'url', 'sub_title'], 'string', 'max' => 120],
            [['title_pic'], 'string', 'max' => 128],
            [['summary'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fragment_id' => '所属碎片',
            'title' => '标题',
            'title_format' => '标题格式',
            'title_pic' => '标题图片',
            'url' => '连接',
            'sub_title' => '副标题',
            'summary' => '简介',
            'publish_time' => '发布时间',
            'sort_num' => '排序',
        ];
    }
    
    public function beforeValidate()
    {
    	if(parent::beforeValidate())
    	{
    		$this->title_format=CommonUtility::getTitleFormatValue($this->title_format);
    		
    		$uploadedFile = CommonUtility::uploadFile('Fragment2Data[title_pic]');
    		if($uploadedFile!=null)
    		{
    			$this->title_pic=$uploadedFile['url'].$uploadedFile['new_name'];
    		}
    		
    		return true;
    	}
    	return false;
    }
    
    public function beforeSave($insert)
    {
    	return parent::beforeSave($insert);
    }
}

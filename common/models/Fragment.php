<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "yii_fragment".
 *
 * @property integer $id
 * @property integer $category_id
 * @property string $name
 * @property integer $type
 * @property integer $sort_num
 */
class Fragment extends \components\base\BaseActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'yii_fragment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'name', 'type'], 'required'],
            [['category_id', 'type', 'sort_num'], 'integer'],
            [['name'], 'string', 'max' => 64]
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
            'name' => '碎片名称',
            'type' => '碎片类型',
            'sort_num' => '排序',
        ];
    }
    
    public static function deleteData($id,$type)
    {
    	Fragment::deleteAll(['id'=>$id]);
    	
    	if($type===1)
    	{
    		Fragment1Data::deleteAll(['fragment_id'=>$id]);
    	}
    	else if($type===2)
    	{
    		Fragment2Data::deleteAll(['fragment_id'=>$id]);
    	}
    	else if($type===3)
    	{
    		Fragment3Data::deleteAll(['fragment_id'=>$id]);
    	}
    	return true;
    }
}

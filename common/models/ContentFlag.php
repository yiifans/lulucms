<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "yii_content_flag".
 *
 * @property string $id
 * @property string $name
 * @property integer $value
 * @property string $node
 */
class ContentFlag extends \components\base\BaseActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'yii_content_flag';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'name', 'value'], 'required'],
            [['value'], 'integer'],
            [['id', 'name'], 'string', 'max' => 64],
            [['note'], 'string', 'max' => 256],
            [['id'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '标签',
            'name' => '名称',
            'value' => '值',            
            'note' => '备注',
        ];
    }
    
    public static function getFlags()
    {
    	return self::findAll(null,'value asc');
    }
}

<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "yii_dict_category".
 *
 * @property string $key
 * @property string $name
 * @property string $description
 * @property integer $is_sys
 */
class DictCategory extends \components\base\BaseActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'yii_dict_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['key', 'name', 'is_sys'], 'required'],
            [['is_sys'], 'integer'],
            [['key', 'name'], 'string', 'max' => 64],
            [['description'], 'string', 'max' => 512]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'key' => 'Key',
            'name' => '名称',
            'description' => '描述',
            'is_sys' => '是否系统',
        ];
    }
}

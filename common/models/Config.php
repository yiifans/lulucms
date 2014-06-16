<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "yii_config".
 *
 * @property string $key
 * @property string $name
 * @property string $value
 * @property string $datatype
 */
class Config extends \components\base\BaseActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'yii_config';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['key', 'name', 'value'], 'required'],
            [['key', 'name'], 'string', 'max' => 64],
            [['value'], 'string', 'max' => 1024],
            [['datatype'], 'string', 'max' => 32],
            [['key'], 'unique']
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
            'value' => '值',
            'datatype' => '数据类型',
        ];
    }
}

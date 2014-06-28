<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "yii_config".
 *
 * @property string $scope
 * @property string $variable
 * @property string $name
 * @property string $value
 * @property string $description
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
            [['scope', 'variable', 'name'], 'required'],
            [['scope', 'variable', 'name'], 'string', 'max' => 64],
            [['value'], 'string', 'max' => 1024],
            [['description'], 'string', 'max' => 256],
            [['variable'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
        	'scope' => 'Scope',
            'variable' => '变量名',
            'name' => '名称',
            'value' => '值',
            'description' => '描述',
        ];
    }
}

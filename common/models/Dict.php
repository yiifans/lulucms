<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "yii_dict".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property string $category_key
 * @property string $name
 * @property string $value
 * @property string $datatype
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
            [['parent_id', 'category_key', 'name', 'value'], 'required'],
            [['parent_id', 'sort_num'], 'integer'],
            [['category_key', 'name'], 'string', 'max' => 64],
            [['value'], 'string', 'max' => 1024],
            [['datatype'], 'string', 'max' => 32]
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
            'category_key' => '分类',
            'name' => '名称',
            'value' => '值',
            'datatype' => '数据类型',
            'sort_num' => '排序',
        ];
    }
}

<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "yii_fragment_category".
 *
 * @property integer $id
 * @property string $name
 * @property integer $type
 * @property integer $sort_num
 */
class FragmentCategory extends \components\base\BaseActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'yii_fragment_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'type', 'sort_num'], 'required'],
            [['type', 'sort_num'], 'integer'],
            [['name'], 'string', 'max' => 80]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '分类名称',
            'type' => '碎片类型',
            'sort_num' => '排序',
        ];
    }
}

<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "yii_fragment1_data".
 *
 * @property integer $id
 * @property integer $fragment_id
 * @property string $title
 * @property string $content
 * @property integer $sort_num
 */
class Fragment1Data extends FragmentData
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'yii_fragment1_data';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fragment_id', 'title', 'content'], 'required'],
            [['fragment_id', 'sort_num'], 'integer'],
            [['title'], 'string','max'=>128],
            [['content'], 'string']
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
            'content' => '内容',
            'sort_num' => '排序',
        ];
    }
}

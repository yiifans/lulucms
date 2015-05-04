<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "yii_fragment3_data".
 *
 * @property integer $id
 * @property integer $fragment_id
 * @property integer $channel_id
 * @property integer $content_id
 * @property integer $sort_num
 */
class Fragment3Data extends FragmentData
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'yii_fragment3_data';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fragment_id', 'channel_id', 'content_id'], 'required'],
            [['fragment_id', 'channel_id', 'content_id', 'sort_num'], 'integer']
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
            'channel_id' => '频道ID',
            'content_id' => '内容ID',
            'sort_num' => '排序',
        ];
    }
}

<?php

namespace common\models\content;


use components\base\BaseActiveRecord;
/**
 * This is the model class for table "model_news".
 *
 * @property integer $id
 * @property integer $channel_id
 * @property integer $user_id
 * @property string $user_name
 * @property string $publish_time
 * @property string $modify_time
 * @property integer $att1
 * @property integer $att2
 * @property integer $att3
 * @property integer $views
 * @property integer $commonts
 * @property integer $flag
 * @property integer $status
 * @property string $title
 * @property string $title_format
 * @property string $title_pic
 * @property string $redirect_url
 * @property string $keywords
 * @property string $sub_title
 * @property string $summary
 * @property string $content
 * @property string $source
 */
class Content extends BaseActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'model_news';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['channel_id', 'user_id', 'user_name', 'publish_time', 'modify_time', 'att1', 'att2', 'att3', 'flag', 'status', 'title', 'source'], 'required'],
            [['channel_id', 'user_id', 'att1', 'att2', 'att3', 'flag', 'views', 'commonts', 'status'], 'integer'],
            [['publish_time', 'modify_time'], 'safe'],
            [['content'], 'string'],
            [['user_name'], 'string', 'max' => 80],
            [['title', 'title_format', 'title_pic', 'redirect_url', 'keywords', 'sub_title'], 'string', 'max' => 128],
            [['summary'], 'string', 'max' => 512],
            [['source'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'channel_id' => 'Channel ID',
            'user_id' => 'User ID',
            'user_name' => 'User Name',
            'publish_time' => 'Publish Time',
            'modify_time' => 'Modify Time',
            'att1' => 'Att1',
            'att2' => 'Att2',
            'att3' => 'Att3',
            'flag' => 'Flag',
            'status' => 'Status',
            'title' => 'Title',
            'title_format' => 'Title Format',
            'title_pic' => 'Title Pic',
            'redirect_url' => 'Redirect Url',
            'keywords' => 'Keywords',
            'sub_title' => 'Sub Title',
            'summary' => 'Summary',
            'content' => 'Content',
            'source' => 'Source',
        ];
    }
}

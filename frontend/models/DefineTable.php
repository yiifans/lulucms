<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "yii_define_table".
 *
 * @property string $name
 * @property string $name_en
 * @property string $description
 * @property integer $is_default
 * @property string $channel_tpl
 * @property string $list_tpl
 * @property string $detail_tpl
 * @property string $back_form_tpl
 * @property string $back_action_index
 * @property string $back_action_create
 * @property string $back_action_update
 * @property string $back_action_delete
 * @property string $back_action_other
 * @property string $front_form_tpl
 * @property string $front_action_index
 * @property string $front_action_create
 * @property string $front_action_update
 * @property string $front_action_delete
 * @property string $front_action_other
 * @property string $note
 */
class DefineTable extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'yii_define_table';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'name_en'], 'required'],
            [['is_default'], 'integer'],
            [['name', 'name_en', 'description', 'note'], 'string', 'max' => 80],
            [['channel_tpl', 'list_tpl', 'detail_tpl', 'back_form_tpl', 'back_action_index', 'back_action_create', 'back_action_update', 'back_action_delete', 'back_action_other', 'front_form_tpl', 'front_action_index', 'front_action_create', 'front_action_update', 'front_action_delete', 'front_action_other'], 'string', 'max' => 64],
            [['name_en'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Name',
            'name_en' => 'Name En',
            'description' => 'Description',
            'is_default' => 'Is Default',
            'channel_tpl' => 'Channel Tpl',
            'list_tpl' => 'List Tpl',
            'detail_tpl' => 'Detail Tpl',
            'back_form_tpl' => 'Back Form Tpl',
            'back_action_index' => 'Back Action Index',
            'back_action_create' => 'Back Action Create',
            'back_action_update' => 'Back Action Update',
            'back_action_delete' => 'Back Action Delete',
            'back_action_other' => 'Back Action Other',
            'front_form_tpl' => 'Front Form Tpl',
            'front_action_index' => 'Front Action Index',
            'front_action_create' => 'Front Action Create',
            'front_action_update' => 'Front Action Update',
            'front_action_delete' => 'Front Action Delete',
            'front_action_other' => 'Front Action Other',
            'note' => 'Note',
        ];
    }
}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "yii_define_table_field".
 *
 * @property integer $id
 * @property string $table
 * @property string $name
 * @property string $name_en
 * @property string $type
 * @property integer $length
 * @property integer $is_null
 * @property integer $is_main
 * @property integer $is_sys
 * @property integer $sort_num
 * @property string $note
 * @property integer $front_status
 * @property string $front_fun_add
 * @property string $front_fun_update
 * @property string $front_fun_show
 * @property string $front_form_type
 * @property string $front_form_option
 * @property string $front_form_default
 * @property string $front_form_source
 * @property string $front_form_html
 * @property string $front_note
 * @property integer $back_status
 * @property string $back_fun_add
 * @property string $back_fun_update
 * @property string $back_fun_show
 * @property string $back_form_type
 * @property string $back_form_option
 * @property string $back_form_default
 * @property string $back_form_source
 * @property string $back_form_html
 * @property string $back_note
 */
class DefineTableField extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'yii_define_table_field';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['table', 'name', 'name_en', 'type', 'front_form_type', 'back_form_type'], 'required'],
            [['length', 'is_null', 'is_main', 'is_sys', 'sort_num', 'front_status', 'back_status'], 'integer'],
            [['table', 'name', 'name_en', 'type'], 'string', 'max' => 80],
            [['note'], 'string', 'max' => 200],
            [['front_fun_add', 'front_fun_update', 'front_fun_show', 'front_form_type', 'back_fun_add', 'back_fun_update', 'back_fun_show', 'back_form_type'], 'string', 'max' => 64],
            [['front_form_option', 'front_form_default', 'back_form_option', 'back_form_default'], 'string', 'max' => 128],
            [['front_form_source', 'front_form_html', 'front_note', 'back_form_source', 'back_form_html', 'back_note'], 'string', 'max' => 512]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'table' => 'Table',
            'name' => 'Name',
            'name_en' => 'Name En',
            'type' => 'Type',
            'length' => 'Length',
            'is_null' => 'Is Null',
            'is_main' => 'Is Main',
            'is_sys' => 'Is Sys',
            'sort_num' => 'Sort Num',
            'note' => 'Note',
            'front_status' => 'Front Status',
            'front_fun_add' => 'Front Fun Add',
            'front_fun_update' => 'Front Fun Update',
            'front_fun_show' => 'Front Fun Show',
            'front_form_type' => 'Front Form Type',
            'front_form_option' => 'Front Form Option',
            'front_form_default' => 'Front Form Default',
            'front_form_source' => 'Front Form Source',
            'front_form_html' => 'Front Form Html',
            'front_note' => 'Front Note',
            'back_status' => 'Back Status',
            'back_fun_add' => 'Back Fun Add',
            'back_fun_update' => 'Back Fun Update',
            'back_fun_show' => 'Back Fun Show',
            'back_form_type' => 'Back Form Type',
            'back_form_option' => 'Back Form Option',
            'back_form_default' => 'Back Form Default',
            'back_form_source' => 'Back Form Source',
            'back_form_html' => 'Back Form Html',
            'back_note' => 'Back Note',
        ];
    }
}

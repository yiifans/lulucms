<?php

namespace common\models;

use components\base\BaseActiveRecord;
use yii\helpers\Html;
use components\LuLu;
use yii\base\InvalidParamException;
use components\helpers\TStringHelper;
/**
 * This is the model class for table "yii_define_table_field".
 *
 * @property integer $id
 * @property string $table
 * @property string $field_name
 * @property string $name
 * @property string $type
 * @property integer $length
 * @property boolean $is_null
 * @property boolean $is_index
 * @property boolean $is_unique
 * @property boolean $is_main
 * @property boolean $is_sys
 * @property integer $sort_num
 * @property string $note
 * @property boolean $front_status
 * @property string $front_fun_add
 * @property string $front_fun_update
 * @property string $front_fun_show
 * @property string $front_form_type
 * @property string $front_form_option
 * @property string $front_form_default
 * @property string $front_form_source
 * @property string $front_form_html
 * @property string $front_note
 * @property boolean $back_status
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
class DefineTableField extends BaseActiveRecord
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
            [['table', 'field_name', 'name', 'type', 'front_form_type', 'back_form_type'], 'required'],
            [['length', 'sort_num'], 'integer'],
            [['is_null', 'is_index', 'is_unique', 'is_main', 'is_sys', 'front_status', 'back_status'], 'boolean'],
            [['table', 'field_name', 'name', 'type'], 'string', 'max' => 80],
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
			'table' => '所属表',
			'field_name' => '字段名',
			'name' => '名称',
			'type' => '类型',
			'length' => '长度',
			'is_null' => '为空',
			'is_index' => '索引',
			'is_unique' => '唯一',
			'is_main' => '主表',
			'is_sys' => '系统字段',
			'sort_num' => '排序',
			'note' => '备注',
			'front_status' => '前台可用',
			'front_fun_add' => '添加处理函数',
			'front_fun_update' => '修改处理函数',
			'front_fun_show' => '显示处理函数',
			'front_form_type' => '表单类型',
			'front_form_option' => '表单选项',
			'front_form_default' => '默认值',
			'front_form_source' => '数据源',
			'front_form_html' => '表单代码',
			'front_note' => '备注',
			'back_status' => '后台可用',
			'back_fun_add' => '添加处理函数',
			'back_fun_update' => '修改处理函数',
			'back_fun_show' => '显示处理函数',
			'back_form_type' => '表单类型',
			'back_form_option' => '表单选项',
			'back_form_default' => '默认值',
			'back_form_source' => '数据源',
			'back_form_html' => '表单代码',
			'back_note' => '备注',
		];
	}
	
	private function checkLength()
	{
		$type=strtolower($this->type);
		if($type=="varchar" || $type=="char"||$type=='tinyint')
		{
			$defaultLength = $type=='tinyint'? 4:255;
				
			$length=$this->length;
			if(intval($length)<=0)
			{
				$this->length=$defaultLength;
			}
			return $this->length;
		}
		return false;
	}
	
	public function getFieldType()
	{
		$type=strtolower($this->type);
		
		$length = $this->checkLength();
		if($length!==false)
		{
			$type.='('.$length.')';
		}
		return $type;
	}
	
	public function beforeSave($insert)
	{
		if(parent::beforeSave($insert))
		{
			$this->checkLength();
			
			return true;
		}
		return false;
	}

	
}
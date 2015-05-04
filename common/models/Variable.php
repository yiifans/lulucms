<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "yii_variable".
 *
 * @property string $id
 * @property string $name
 * @property string $value
 * @property integer $data_type
 * @property boolean $is_cache
 * @property string $note
 */
class Variable extends \components\base\BaseActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'yii_variable';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'name', 'value'], 'required'],
            [['value'], 'string'],
            [['id'], 'unique'],
            [['is_cache'], 'boolean'],
            [['data_type'], 'integer'],
            [['id', 'name'], 'string', 'max' => 64],
            [['note'], 'string', 'max' => 256]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '变量名',
            'name' => '标识',
            'value' => '变量值',
            'data_type' => '数据类型',
            'is_cache' => '是否缓存',
            'note' => '备注',
        ];
    }
    
    public function beforeValidate()
    {
    	if($this->is_cache==null)
    	{
    		$this->is_cache=true;
    	}
    	return parent::beforeValidate();
    }
    
    public function checkExist()
    {
    	if($this->isNewRecord||$this->id!=$this->oldAttributes['id'])
    	{
    		$ret = Variable::findOne($this->id);
    		return $ret!==null;
    	}
    	return false;
    }
}

<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "yii_variable".
 *
 * @property string $variable
 * @property string $name
 * @property string $value
 * @property integer $data_type
 * @property string $description
 * @property boolean $is_cache
 * @property integer $sort_num
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
            [['variable', 'name'], 'required'],
            [['value'], 'string'],
            [['variable'], 'unique'],
            [['is_cache'], 'boolean'],
            [['data_type', 'sort_num'], 'integer'],
            [['variable', 'name'], 'string', 'max' => 64],
            [['description'], 'string', 'max' => 256]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'variable' => '变量名',
            'name' => '标识',
            'value' => '变量值',
            'data_type' => '数据类型',
            'description' => '描述',
            'is_cache' => '是否缓存',
            'sort_num' => '排序',
        ];
    }
    
    public function beforeValidate()
    {
    	if($this->sort_num==null)
    	{
    		$this->sort_num=0;
    	}
    	if($this->is_cache==null)
    	{
    		$this->is_cache=true;
    	}
    	return parent::beforeValidate();
    }
    
    public function checkExist()
    {
    	if($this->isNewRecord||$this->variable!=$this->oldAttributes['variable'])
    	{
    		$ret = Variable::findOne($this->variable);
    		return $ret!==null;
    	}
    	return false;
    }
}

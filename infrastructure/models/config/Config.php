<?php

namespace common\models\config;

use Yii;
use components\helpers\TStringHelper;

/**
 * This is the model class for table "yii_config".
 *
 * @property string $scope
 * @property string $variable
 * @property string $name
 * @property string $value
 * @property string $description
 */
class Config extends \components\base\BaseActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'yii_config';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['scope', 'variable', 'name'], 'required'],
            [['scope', 'variable', 'name'], 'string', 'max' => 64],
            [['value'], 'string', 'max' => 1024],
            [['description'], 'string', 'max' => 256],
            [['variable'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
        	'scope' => 'Scope',
            'variable' => '变量名',
            'name' => '名称',
            'value' => '值',
            'description' => '描述',
        ];
    }
    
    
    public static function getModel($id)
    {
    	return Config::findOne(['variable'=>$id]);
    }
    
    public static function getValue($id,$defaultValue='')
    {
    	$model = Config::findOne(['variable'=>$id]);
    	
    	if($model==null||empty($model['value']))
    	{
    		return $defaultValue;
    	}
    	return $model['value'];
    }
    
    public static function getContentAtt($id)
    {
    	$ret=[];
    	$ret[]='请选择';
    	 
    	$model = self::getModel($id);
    	 
    	$items = explode("\r\n", $model['value']);
    	
    	foreach ($items as $item)
    	{
    		$ret[]=$item;
    	}
    	
    	return $ret;
    }
    
    public static function getArrayValue($id)
    {
    	$ret=[];
    	$ret[]='请选择';
    	
    	$model = self::getModel($id);
    	
    	$items = explode('\r\n', $model['value']);
    	foreach ($items as $item)
    	{
    		if(empty($item))
    		{
    			continue;
    		}
    		$ret[]=$item;
    	}
    	return $ret;
    }
}

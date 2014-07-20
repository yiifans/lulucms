<?php

namespace common\models\config;

use Yii;
use components\helpers\TStringHelper;

/**
 * This is the model class for table "yii_config".
 *
 * @property string $id
 * @property string $scope
 * @property string $value
 * @property string $node
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
            [['scope', 'id'], 'required'],
            [['scope', 'id'], 'string', 'max' => 64],
            [['value'], 'string', 'max' => 1024],
            [['note'], 'string', 'max' => 256],
            [['id'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
        	'scope' => 'Scope',
            'id' => '变量名',
            'value' => '值',
            'note' => '备注',
        ];
    }
    
    
    public static function getModel($id)
    {
    	return Config::findOne(['id'=>$id]);
    }
    
    public static function getValue($id,$defaultValue='')
    {
    	$model = Config::findOne(['id'=>$id]);
    	
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

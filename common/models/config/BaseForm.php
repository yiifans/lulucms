<?php

namespace common\models\config;

use Yii;
use yii\base\Model;
use ReflectionClass;
use components\LuLu;
use components\base\BaseModel;
use yii\db\Query;

/**
 * LoginForm is the model behind the login form.
 */
class BaseForm extends BaseModel
{
	protected $scope;
	
	public $isNewRecord = false;
	
	public static function tableName()
	{
		return 'yii_config';
	}
	

	public function loadModel()
	{
		$sql ='select * from yii_config where scope=\''.$this->scope.'\'';
		$rows = LuLu::queryAll($sql);
		
		foreach ($rows as $row)
		{
			$variable = $row['variable'];
			$this->$variable= $row['value'];
		}
	}
	
	public function save()
	{
		$attributes = $this->getAttributes();
		
		foreach ($attributes as $name=>$value)
		{
			$sql = "select * from yii_config where variable = '$name'";
			$exist = LuLu::createCommand($sql)->queryOne();
			if($exist)
			{
				LuLu::createCommand()
					->update('yii_config', ['value' => $value], ['variable'=>$name])
					->execute();
			}
			else 
			{
				$columns=[];
				$columns['scope']=$this->scope;
				$columns['variable']=$name;
				$columns['value']=$value;
				$columns['description']=$name;
				
				LuLu::createCommand()
					->insert('yii_config', $columns)
					->execute();
			}
			
		}
	}
}

<?php

namespace common\models\config;

use Yii;
use yii\base\Model;
use ReflectionClass;
use components\LuLu;
use components\base\BaseModel;
use yii\db\Query;
use common\includes\CacheUtility;

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
		$rows = Config::findAll(['scope'=>$this->scope]);
		
		foreach ($rows as $row)
		{
			$id = $row['id'];
			$this->$id= $row['value'];
		}
	}
	
	protected function saveItem($id,$value)
	{
		$exist = Config::findOne($id);
		
		if($exist)
		{
			Config::updateAll(['value'=>$value],['id'=>$id]);
		}
		else
		{
			$model = new Model();
			$model->scope=$this->scope;
			$model->id=$id;
			$model->value=$value;
			$model->description=$id;
			
			$model->save();
		}		
	}
	public function save()
	{
		$attributes = $this->getAttributes();
		
		foreach ($attributes as $id=>$value)
		{
			$this->saveItem($id, $value);
		}
		CacheUtility::createConfigCache();
	}
}

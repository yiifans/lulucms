<?php
namespace TS;

use Yii;

use yii\web;
use yii\web\Controller;
use yii\helpers\VarDumper;
use app\controllers\CatalogController;

class TController extends Controller
{
	public function execute($sql)
	{
		//Yii::info($sql,__METHOD__);
		$db=\Yii::$app->db;
		$command=$db->createCommand($sql);
		$command->execute();
	}
	
	public function queryAll($sql)
	{
		//Yii::info($sql,__METHOD__);
		$db=\Yii::$app->db;
		$command=$db->createCommand($sql);
		return $command->queryAll();
	}
	public function queryOne($sql)
	{
		//Yii::info($sql,__METHOD__);
		$db=\Yii::$app->db;
		$command=$db->createCommand($sql);
		return $command->queryOne();
	}
	
	public function hasGetValue($key)
	{
		return isset($_GET[$key]);
	}
	public function getGetValue($key,$default=NULL)
	{
		if($this->hasGetValue($key))
		{
			return $_GET[$key];
		}
		return $default;
	}
	
	public function hasPostValue($key)
	{
		return isset($_POST[$key]);
	}
	
	public function getPostValue($key,$default=NULL)
	{
		if($this->hasPostValue($key))
		{
			return $_POST[$key];
		}
		return $default;
	}
	
	public function info($var,$category = 'application')
	{
		$dump=VarDumper::dumpAsString($var);
		Yii::info($category.$dump,$category);
	}
	
	public function setViewParam($array)
	{
		$view=$this->getView();
		foreach ($array as $name=>$value)
		{
			$view->params[$name] =$value;
		}
	}
	public function getViewParam($key)
	{
		$view = $this->getView();
		if(isset($view->params[$key]))
		{
			return $view->params[$key];
		}
		return null;
	}
}
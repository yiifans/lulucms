<?php

namespace backend\controllers;

use Yii;

use common\models\DefineTable;
use backend\base\BaseBackController;
use components\LuLu;
use backend;

/**
 * ChannelController implements the CRUD actions for Channel model.
 */
class ContentController extends BaseBackController
{	
	public $layout='left_content';
	
	public function actions()
	{
		$chnid = LuLu::getGetValue('chnid');
		
		$cachedChannels = LuLu::getAppParam('cachedChannels',[]);
		
		if($chnid == null||empty($chnid)||!isset($cachedChannels[$chnid]))
		{
			return [];
		}
		
		$channel = $cachedChannels[$chnid];
		$tableName=$channel['table'];
		
		if(empty($tableName))
		{
			return [];
		}
		
		$table = DefineTable::findOne(['name_en'=>$tableName]);
		
		$ret =$table->getBackActions();

		LuLu::info($ret);
		return $ret;
	}

	public function actionIndex($chnid=0)
	{
		$action = new backend\actions\content\model_default\IndexAction('index',$this);
		return $action->run($chnid);
	}

	public function actionCreate($chnid)
	{	
		$action = new backend\actions\content\model_default\CreateAction('create',$this);
		return $action->run($chnid);
	}
	
	public function actionUpdate($chnid,$id)
	{
		$action = new backend\actions\content\model_default\UpdateAction('update',$this);
		return $action->run($chnid,$id);
	}

	public function actionDelete($chnid,$id)
	{
		$action = new backend\actions\content\model_default\DeleteAction('delete',$this);
		return $action->run($chnid,$id);
	}

	public function actionOther($chnid,$id)
	{
		$action = new backend\actions\content\model_default\OtherAction('other',$this);
		return $action->run($chnid,$id);
	}
	
	
}

<?php

namespace frontend\controllers;

use Yii;
use common\models\Channel;
use common\models\search\ChannelSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\VarDumper;
use yii\web\HttpException;
use common\models\Content;

use common\models\DefineModel;
use common\models\DefineTable;

use ts\helpers\TStringHelper;
use common\models\TplList;
use common\models\TplCover;
use common\models\TplChannel;
use common\models\TplView;
use TS\DataSource;
use components\LuLu;
use frontend\base\BaseFrontController;

/**
 * ChannelController implements the CRUD actions for Channel model.
 */
class ContentController extends BaseFrontController
{
	
	public function behaviors()
	{
		return [
			'verbs' => [
				'class' => VerbFilter::className(),
				'actions' => [
					'delete' => ['post'],
				],
			],
		];
	}

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
	
		$ret =$table->getFrontActions();
	
		LuLu::info($ret);
		return $ret;
	}
	
	
	
	public function actionIndex($chnid=0)
	{
		$action = new frontend\actions\content\model_default\IndexAction('index',$this);
		return $action->run($chnid);
	}
	
	public function actionList($chnid=0)
	{
		$action = new frontend\actions\content\model_default\ListAction('index',$this);
		return $action->run($chnid);
	}
	
	public function actionDetail($chnid=0)
	{
		$action = new frontend\actions\content\model_default\DetailAction('index',$this);
		return $action->run($chnid);
	}
	
	public function actionCreate($chnid)
	{
		$action = new frontend\actions\content\model_default\CreateAction('create',$this);
		return $action->run($chnid);
	}
	
	public function actionUpdate($chnid,$id)
	{
		$action = new frontend\actions\content\model_default\UpdateAction('update',$this);
		return $action->run($chnid);
	}
	
	public function actionDelete($chnid,$id)
	{
		$action = new frontend\actions\content\model_default\DeleteAction('delete',$this);
		return $action->run($chnid,$id);
	}
	
	public function actionOther($chnid,$id)
	{
		$action = new frontend\actions\content\model_default\OtherAction('other',$this);
		return $action->run($chnid,$id);
	}
	
	
}

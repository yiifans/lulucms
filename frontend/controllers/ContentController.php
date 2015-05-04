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
use common\includes\CommonUtility;

/**
 * ChannelController implements the CRUD actions for Channel model.
 */
class ContentController extends BaseFrontController
{

	public function actions()
	{
		$chnid = LuLu::getGetValue('chnid', '');
		
		$channel = $this->getChannel($chnid);
		$table = CommonUtility::getCachedTable($channel['table']);
		return DefineTable::getFrontActions($table);
	}

	public function actionChannel($chnid = 0)
	{
		$action = new \frontend\actions\content\model_default\ChannelAction('channel', $this);
		return $action->run($chnid);
	}

	public function actionList($chnid = 0)
	{
		$action = new \frontend\actions\content\model_default\ListAction('list', $this);
		return $action->run($chnid);
	}

	public function actionDetail($chnid = 0,$id)
	{
		$action = new \frontend\actions\content\model_default\DetailAction('detail', $this);
		return $action->run($chnid,$id);
	}

	public function actionSearch($chnid = 0)
	{
		$action = new \frontend\actions\content\model_default\SearchAction('search', $this);
		return $action->run($chnid);
	}

	public function actionManager($chnid = 0)
	{
		$action = new \frontend\actions\content\model_default\ManagerAction('manager', $this);
		return $action->run($chnid);
	}

	public function actionCreate($chnid)
	{
		$action = new \frontend\actions\content\model_default\CreateAction('create', $this);
		return $action->run($chnid);
	}

	public function actionUpdate($chnid, $id)
	{
		$action = new \frontend\actions\content\model_default\UpdateAction('update', $this);
		return $action->run($chnid);
	}

	public function actionDelete($chnid, $id)
	{
		$action = new \frontend\actions\content\model_default\DeleteAction('delete', $this);
		return $action->run($chnid, $id);
	}

	public function actionOther($chnid, $id)
	{
		$action = new \frontend\actions\content\model_default\OtherAction('other', $this);
		return $action->run($chnid, $id);
	}
}

<?php

namespace backend\controllers;

use Yii;
use common\models\DefineTable;
use backend\base\BaseBackController;
use components\LuLu;
use backend;
use common\includes\CommonUtility;

/**
 * ChannelController implements the CRUD actions for Channel model.
 */
class ContentController extends BaseBackController
{

	public function actions()
	{
		$chnid = LuLu::getGetValue('chnid');
		
		$channel = $this->getChannel($chnid);
		$table = CommonUtility::getCachedTable($channel['table']);
		return DefineTable::getBackActions($table);
	}

	public function actionManager($chnid = 0)
	{
		$action = new backend\actions\content\model_default\ManagerAction('manager', $this);
		return $action->run($chnid);
	}

	public function actionCreate($chnid)
	{
		$action = new backend\actions\content\model_default\CreateAction('create', $this);
		return $action->run($chnid);
	}

	public function actionUpdate($chnid, $id)
	{
		$action = new backend\actions\content\model_default\UpdateAction('update', $this);
		return $action->run($chnid, $id);
	}

	public function actionDelete($chnid, $id)
	{
		$action = new backend\actions\content\model_default\DeleteAction('delete', $this);
		return $action->run($chnid, $id);
	}

	public function actionOther($chnid, $id)
	{
		$action = new backend\actions\content\model_default\OtherAction('other', $this);
		return $action->run($chnid, $id);
	}
}

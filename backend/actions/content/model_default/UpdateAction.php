<?php

namespace backend\actions\content\model_default;

use Yii;
use common\models\search\ChannelSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use common\models\Content;
use yii\web\HttpException;
use common\models\DefineModel;
use common\models\DefineTable;
use common\models\Channel;
use common\models\TplForm;
use backend\base\BaseBackController;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use components\LuLu;
use common\models\DefineTableField;
use common\models\content\DefaultContent;
use components\helpers\TTimeHelper;
use components\base\BaseAction;
use backend\actions\content\ContentAction;

/**
 * ChannelController implements the CRUD actions for Channel model.
 */
class UpdateAction extends ContentAction
{

	public function run($chnid, $id)
	{
		$currentChannel = Channel::findOne($chnid);
		
		$this->currentTableName = $currentChannel['table'];
		
		$attValues = $this->findModel($id);
		
		$model = new DefaultContent($currentChannel['table']);
		$model->setIsNewRecord(false);
		$model->attributes = $attValues;
		
		if($model->load($_POST))
		{
			$this->saveContent($model);
			
			return $this->redirect(['manager', 'chnid' => $chnid]);
		}
		else
		{
			$locals = [];
			$locals['model'] = $model;
			$locals['chnid'] = $chnid;
			$locals['currentChannel'] = $currentChannel;
			$locals['fields'] = DefineTableField::findAll(['table' => $currentChannel['table'], 'is_sys' => 0]);
			
			$tplName = $this->getTpl($chnid, 'update');
			
			return $this->render($tplName, $locals);
		}
	}
}

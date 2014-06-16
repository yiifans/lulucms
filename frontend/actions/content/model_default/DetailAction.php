<?php

namespace frontend\actions\content\model_default;

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
use common\contentmodels\CommonContent;
use components\helpers\TTimeHelper;
use components\base\BaseAction;
use backend\actions\content\ContentAction;

/**
 * ChannelController implements the CRUD actions for Channel model.
 */
class DetailAction extends ContentAction
{
	public function run($chnid=0)
	{
		$channelModel = Channel::findOne($chnid);
		
		$detailTpl=$this->getDetailTpl($chnid);
	
		$this->currentTableName=$channelModel->table;
		$model=$this->findModel($id);
		
		$params=[];
		$params['model']=$model;
		$params['currentChannel']=$channelModel;
		
		return $this->render($detailTpl, $params);
	}
	
}

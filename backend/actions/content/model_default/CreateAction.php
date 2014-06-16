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
use common\contentmodels\CommonContent;
use components\helpers\TTimeHelper;
use components\base\BaseAction;
use backend\actions\content\ContentAction;

/**
 * ChannelController implements the CRUD actions for Channel model.
 */
class CreateAction extends ContentAction
{
	public function run($chnid)
	{	
		$currentChannel=Channel::findOne($chnid);
		$this->currentTableName = $currentChannel['table'];
		
		$model = new CommonContent($currentChannel['table']);
		$model->setIsNewRecord(true);
		
		if ($model->load($_POST)) {
				
			$this->saveContent($model,true);
				
			return $this->redirect(['manager', 'chnid' => $chnid]);
		} else {
			$locals = $this->initContent($model,$currentChannel);
		
			$tplName = $this->getTpl($chnid, 'create');
			
			return $this->render($tplName, $locals);
		}
	}
	

}

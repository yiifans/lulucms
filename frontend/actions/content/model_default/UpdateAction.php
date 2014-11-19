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
use frontend\actions\content\ContentAction;

/**
 * ChannelController implements the CRUD actions for Channel model.
 */
class UpdateAction extends ContentAction
{
	public function run($chnid,$id)
	{
		$channelModel=Channel::findOne($chnid);
		
		$model = [];

		if (true) {
			return $this->redirect(['manager', 'cid' => $chnid]);
		} else {
			$locals=[];
			$locals['model']=$model;
			$locals['currentChannel']=$channelModel;
			
			$updateTpl=$this->getTpl($chnid, 'update');
			
			return $this->render($updateTpl, $locals);
		}
	}
	
	
	

}

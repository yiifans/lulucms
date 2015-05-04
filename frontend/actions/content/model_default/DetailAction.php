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
class DetailAction extends ContentAction
{
	public function run($chnid=0,$id)
	{
		$currentChannel = $this->getChannel($chnid);
		
		$this->currentTableName=$currentChannel['table'];
		
		$this->updateViews($id);
		
		$model=$this->findModel($id);
		
		$locals=[];
		$locals['model']=$model;
		$locals['chnid']=$chnid;
		$locals['currentChannel']=$currentChannel;
		$locals['currentModel']=$currentChannel['table'];
		
		$view = LuLu::getView();
		$view->setTitle($model['title']);
		$view->setMetaTag('keywords',$model['title']);
		$view->setMetaTag('description',$model['summary']);
		
		$detailTpl=$this->getTpl($chnid, 'detail_tpl');
		
		return $this->render($detailTpl, $locals);
	}
	
}

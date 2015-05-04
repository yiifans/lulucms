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
use common\includes\DataSource;

/**
 * ChannelController implements the CRUD actions for Channel model.
 */
class ManagerAction extends ContentAction
{
	public function run($chnid=0)
	{
		$channelModel=Channel::findOne($chnid);
	
		$dataList=DataSource::getContentByChannel($chnid);
		
		$locals=[];
		$locals['dataList']=$dataList;
		$locals['currentChannel']=$channelModel;
		
		$indexTpl=$this->getTpl($chnid, 'manager');
		
		return $this->render($indexTpl, $locals);
	}
	
}

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
class ChannelAction extends ContentAction
{
	public function run($chnid=0)
	{
		$channelTpl=$this->getChannelTpl($chnid);
		
		$channelModel=Channel::findOne($chnid);
		
		$childChannelList=Channel::findAll(['parent_id'=>$chnid]);
		
		$dataList=[];
		foreach ($childChannelList as $channel)
		{
			$dataList[$channel->id]=LuLu::getDataSourceFromChannel($channel->id,['limit'=>10,'order'=>'publish_time desc']);
		}
	
		$params=[];
		$params['dataList']=$dataList;
		$params['att1DataList']=LuLu::getDataSourceFromChannel($chnid,['limit'=>10,'where'=>'att1=1']);
		$params['att2DataList']=LuLu::getDataSourceFromChannel($chnid,['limit'=>10,'where'=>'att2=1']);
		$params['att3DataList']=LuLu::getDataSourceFromChannel($chnid,['limit'=>10,'where'=>'att3=1']);
		
		$params['currentChannel']=$channelModel;
		
		return $this->render($channelTpl, $params);
	}
	
}

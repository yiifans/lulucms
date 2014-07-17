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
use common\includes\DataSource;

/**
 * ChannelController implements the CRUD actions for Channel model.
 */
class ChannelAction extends ContentAction
{
	public function run($chnid=0)
	{
		$channelModel=Channel::findOne($chnid);
		
		$childChannelList=Channel::findAll(['parent_id'=>$chnid]);
		
		$dataList=[];
		foreach ($childChannelList as $channel)
		{
			$dataList[$channel->id]=DataSource::getContentByChannel($channel->id,['limit'=>5]);
		}
	
		$locals=[];
		$locals['dataList']=$dataList;
		$locals['chnid']=$chnid;
		$locals['currentChannel']=$channelModel;
		$locals['currentModel']=$channelModel['table'];
		
		$channelTpl=$this->getTpl($chnid, 'channel');
		
		return $this->render($channelTpl, $locals);
	}
	
}

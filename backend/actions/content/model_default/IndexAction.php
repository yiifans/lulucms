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
use common\includes\DataSource;

/**
 * ChannelController implements the CRUD actions for Channel model.
 */
class IndexAction extends ContentAction
{
	public function run($chnid=0)
	{
		if($chnid===0)
		{
			$currentChannel=new Channel;
			$rows=[];
		}
		else
		{
			$currentChannel=Channel::findOne($chnid);
			
			$rows=DataSource::getContentByChannel($chnid);
		}
		
		$channelArrayTree=Channel::getChannelArrayTree();
		
		$locals = [];
		$locals['rows']=$rows;
		$locals['chnid']=$chnid;
		$locals['channelArrayTree']=$channelArrayTree;
		$locals['currentChannel']=$currentChannel;
		
		$tplName = $this->getTpl($chnid, 'index');
		
		return $this->render($tplName, $locals);
	}
	
}

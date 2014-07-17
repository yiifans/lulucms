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
class ListAction extends ContentAction
{
	public function run($chnid)
	{
		$channelModel=Channel::findOne($chnid);
		$tableName = $channelModel['table'];
		
		$query =DataSource::buildContentQuery($tableName,[],'channel_id='.$chnid);
		
		$locals=LuLu::getPagedRows($query);
		$locals['chnid']=$chnid;
		$locals['currentChannel']=$channelModel;
		$locals['currentModel']=$channelModel['table'];
		
		$listTpl=$this->getTpl($chnid, 'list');
		
		return $this->render($listTpl, $locals);
	}
	
}

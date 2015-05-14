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
class ChannelAction extends ContentAction
{

	public function run($chnid = 0)
	{
		$currentChannel = $this->getChannel($chnid);
		
		$childChannels = $this->getChildChannels($chnid);
		
		$dataList = [];
		foreach($childChannels as $channel)
		{
			$dataList[$channel['id']] = DataSource::getContentByChannel($channel['id'], ['limit' => 5]);
		}
		
		$locals = [];
		$locals['dataList'] = $dataList;
		$locals['chnid'] = $chnid;
		$locals['currentChannel'] = $currentChannel;
		$locals['currentModel'] = $currentChannel['table'];
		
		$view = LuLu::getView();
		$view->setTitle(empty($currentChannel['seo_title']) ? $currentChannel['name'] : $currentChannel['seo_title']);
		$view->setMetaTag('keywords', $currentChannel['seo_keywords']);
		$view->setMetaTag('description', $currentChannel['seo_description']);
		
		$channelTpl = $this->getTpl($chnid, 'channel_tpl');
		
		return $this->render($channelTpl, $locals);
	}
}

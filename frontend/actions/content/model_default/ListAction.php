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
class ListAction extends ContentAction
{

	public function run($chnid)
	{
		$currentChannel = $this->getChannel($chnid);
		
		$query = DataSource::buildContentQuery($currentChannel['table'], [], 'channel_id=' . $chnid);
		
		$locals = LuLu::getPagedRows($query);
		$locals['chnid'] = $chnid;
		$locals['currentChannel'] = $currentChannel;
		$locals['currentModel'] = $currentChannel['table'];
		
		$view = LuLu::getView();
		$view->setTitle(empty($currentChannel['seo_title']) ? $currentChannel['name'] : $currentChannel['seo_title']);
		$view->setMetaTag('keywords', $currentChannel['seo_keywords']);
		$view->setMetaTag('description', $currentChannel['seo_description']);
		
		$listTpl = $this->getTpl($chnid, 'list_tpl');
		
		return $this->render($listTpl, $locals);
	}
}

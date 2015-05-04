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
class CreateAction extends ContentAction
{

	public function run($chnid)
	{
		$model = [];
		
		$channelModel = Channel::findOne($chnid);
		
		$formName = 'Content';
		
		if($this->hasPostValue($formName))
		{
			$items = $this->getPostValue($formName);
			// $items['catalog_id']=$channelId;
			$columns = $items;
			
			$db = Yii::$app->db;
			$command = $db->createCommand();
			$command->insert($this->tableName, $columns);
			$command->execute();
			
			return $this->redirect(['manager', 'chnid' => $chnid]);
		}
		else
		{
			$locals = [];
			$locals['model'] = $model;
			$locals['chnid'] = $chnid;
			
			$createTpl = $this->getTpl($chnid, 'create');
			
			return $this->render($createTpl, $locals);
		}
	}
}

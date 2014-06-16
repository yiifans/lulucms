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
class CreateAction extends ContentAction
{
	public function run($chnid)
	{	
	$channelId=LuLu::getGetValue('chnid');
		if($channelId==null)
		{
			throw new HttpException(404,'catalog id is null');
		}
		
		$tplFrontForm='front_form_default';
		$tplBackForm='back_form_default';
		
		$channelModel=Channel::findOne($channelId);
// 		$defineModelModel=DefineModel::find($channelModel->model_id);
// 		if($defineModelModel->tpl_front_form)
// 		{
// 			$tplFrontForm=$defineModelModel->tpl_front_form;
// 		}
// 		if($defineModelModel->tpl_back_form)
// 		{
// 			$tplBackForm=$defineModelModel->tpl_back_form;
// 		}
		
		
		
		$formName='Content';
		
		if ($this->hasPostValue($formName)) {
			
			$items=$this->getPostValue($formName);
			//$items['catalog_id']=$channelId;
			$columns=$items;
			
			$db=Yii::$app->db;
			$command = $db->createCommand();
			$command->insert($this->tableName, $columns);
			$command->execute();
			
			return $this->redirect(['index', 'chnid' => $channelId]);
		} else {
			$model=[];
			return $this->render($tplBackForm, [
				'model' => $model,
				'chnid' => $channelId,
			]);
		}
	}
	

}

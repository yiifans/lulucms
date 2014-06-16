<?php

namespace backend\actions\content;

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
use backend\base\BaseBacAction;
use backend\base\BaseBackAction;
use frontend\base\BaseFrontAction;

/**
 * ChannelController implements the CRUD actions for Channel model.
 */
class ContentAction extends BaseFrontAction
{
	public $currentTableName='model_news4';

	
	public function initContent($model,$currentChannel)
	{
		$tableName = $currentChannel->table;
	
		$locals=[];
		$locals['model']= $model;
		$locals['chnid']=$currentChannel['id'];
		$locals['currentChannel']=$currentChannel;
		$locals['fields']=DefineTableField::findAll(['table'=>$tableName,'is_sys'=>0]);
	
		return $locals;
	}
	
	public function saveContent($model)
	{
		$model->removeSpecialAtt();
			
		LuLu::info($_POST);
			
		$model->user_id=1;
		$model->user_name='admin';
		$model->publish_time=TTimeHelper::getCurrentTime();
		$model->modify_time=TTimeHelper::getCurrentTime();
		$model->title_format=CommonContent::getFormatValue($model->title_format);
		$model->flag=CommonContent::getFlatValue($model->flag);
			
		$db=Yii::$app->db;
		$command = $db->createCommand();
		if($model->isNewRecord)
		{
			$command->insert($this->currentTableName, $model);
		}
		else
		{
			$command->update($this->currentTableName, $model,['id'=>$model['id']]);
		}
	
		$command->execute();
	}
	
	protected function findModel($id)
	{
		//CommonContent::
		$sql='select * from '.$this->currentTableName.' where id='.$id;
	
		$db = Yii::$app->db;
		$command = $db->createCommand($sql);
		return $command->queryOne();
	
	
	}
	
	public function getChannelTpl($chnId)
	{
		return $this->controller->getChannelTpl($chnId);
	}
	
	public function getListTpl($chnId)
	{
		return $this->controller->getListTpl($chnId);
	}
	
	public function getDetailTpl($chnId)
	{
		return $this->controller->getDetailTpl($chnId);
	}
	
	public function getFormTpl($chnId,$isCreateForm=true)
	{
		return $this->controller->getFormTpl($chnId,$isCreateForm);
	}
	
}

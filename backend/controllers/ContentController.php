<?php

namespace backend\controllers;

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

/**
 * ChannelController implements the CRUD actions for Channel model.
 */
class ContentController extends BaseBackController
{
	private $defaultTableName='model_news4';
	
	private $currentTableName='model_news4';
	

	public function beforeAction($action)
	{
		if(parent::beforeAction($action))
		{
			
			return true;
		}
		return false;
	}


	
	/**
	 * Lists all Channel models.
	 * @return mixed
	 */
	public function actionIndex($chnid=0)
	{
		if($chnid===0)
		{			
			$currentChannel=new Channel;
			$rows=[];		
		}
		else 
		{
			$currentChannel=Channel::findOne($chnid);				
			$rows=LuLu::getDataSourceFromChannel($chnid);
		}		

		$channelArrayTree=Channel::getChannelArrayTree();
		
		$locals = [];
		$locals['rows']=$rows;
		$locals['chnid']=$chnid;
		$locals['channelArrayTree']=$channelArrayTree;
		$locals['currentChannel']=$currentChannel;
		return $this->render('index', $locals);
		
	}

	private function getBackFormTpl()
	{
		$table = DefineTable::findOne(['name_en'=>$this->currentTableName]);
			
		$backFormTpl = empty($table['back_form_tpl'])?'form_default':$table['back_form_tpl'];
		return $backFormTpl;
	}
	private function initContent($model,$currentChannel)
	{
		$tableName = $currentChannel->table;
	
		$locals=[];
		$locals['model']= $model;
		$locals['chnid']=$currentChannel['id'];
		$locals['currentChannel']=$currentChannel;
		$locals['fields']=DefineTableField::findAll(['table'=>$tableName,'is_sys'=>0]);
	
		return $locals;
	}
	
	private function saveContent($model)
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
	
	
	/**
	 * Creates a new Channel model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate($chnid)
	{	
		$currentChannel=Channel::findOne($chnid);
		$this->currentTableName = $currentChannel['table'];
		
		$model = new CommonContent($currentChannel['table']);
		$model->setIsNewRecord(true);
		
		if ($model->load($_POST)) {
			
			$this->saveContent($model,true);
			
			return $this->redirect(['index', 'chnid' => $chnid]);
		} else {
			
			$backFormTpl = $this->getBackFormTpl();

			$locals = $this->initContent($model,$currentChannel);
		
			return $this->render($backFormTpl, $locals);
		}
	}

	
	/**
	 * Updates an existing Channel model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionUpdate($chnid,$id)
	{
		$currentChannel=Channel::findOne($chnid);
		
		$this->currentTableName=$currentChannel['table'];
		
		$model = new CommonContent($currentChannel['table']);
		$model->setIsNewRecord(false);
		$model->attributes = $this->findModel($id);

		if ($model->load($_POST)) {
			
			$this->saveContent($model);
			
			return $this->redirect(['index', 'chnid' => $chnid]);
		} else {
			$backFormTpl = $this->getBackFormTpl();
				
			$locals=$this->initContent($model, $currentChannel);
			
			return $this->render($backFormTpl, $locals);
		}
	}

	/**
	 * Deletes an existing Channel model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionDelete($id)
	{
		$model=[];
		return $this->redirect(['index']);
	}

	/**
	 * Finds the Channel model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $id
	 * @return Channel the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id)
	{
		//CommonContent::
		$sql='select * from '.$this->currentTableName.' where id='.$id;
		
		$db = Yii::$app->db;
		$command = $db->createCommand($sql);
		return $command->queryOne();
		
		
	}
	
	
}

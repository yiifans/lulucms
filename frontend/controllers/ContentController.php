<?php

namespace frontend\controllers;

use Yii;
use common\models\Channel;
use common\models\search\ChannelSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\VarDumper;
use yii\web\HttpException;
use common\models\Content;

use common\models\DefineModel;
use common\models\DefineTable;

use ts\helpers\TStringHelper;
use common\models\TplList;
use common\models\TplCover;
use common\models\TplChannel;
use common\models\TplView;
use TS\DataSource;
use components\LuLu;
use frontend\base\BaseFrontController;

/**
 * ChannelController implements the CRUD actions for Channel model.
 */
class ContentController extends BaseFrontController
{
	private $defaultTableName='model_news4';
	
	private $currentTableName='';
	
	public function behaviors()
	{
		return [
			'verbs' => [
				'class' => VerbFilter::className(),
				'actions' => [
					'delete' => ['post'],
				],
			],
		];
	}

	/**
	 * Lists all Channel models.
	 * @return mixed
	 */
	public function actionIndex()
	{
		
		$chnid = LuLu::getGetValue('chnid');
		
		$tplChannel=$this->getTplChannel($chnid,'channel_default');
		
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
		
		return $this->render($tplChannel, $params);
	}

	public function actionList()
	{
		$chnid = LuLu::getGetValue('chnid');
		
		$channelModel=Channel::findOne($chnid);
		
		$tplList=$this->getTplList($chnid,'list_default');
		
	
		$dataList=LuLu::getDataSourceFromChannel($chnid);
		
		$params=[];
		$params['dataList']=$dataList;
		$params['currentChannel']=$channelModel;
		
		return $this->render($tplList, $params);
	}
	/**
	 * Displays a single Channel model.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionView($id)
	{
		$chnid=LuLu::getGetValue('chnid');
		$channelModel = Channel::findOne($chnid);
		
		$tplView=$this->getTplView($chnid,'view_default');
	
		$this->currentTableName=$channelModel->table_name;
		$model=$this->findModel($id);
		
		$params=[];
		$params['model']=$model;
		$params['currentChannel']=$channelModel;
		
		return $this->render($tplView, $params);
	}

	/**
	 * Creates a new Channel model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate()
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

	/**
	 * Updates an existing Channel model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionUpdate($id)
	{
		$model = [];

		if (true) {
			return $this->redirect(['view', 'id' => 0]);
		} else {
			return $this->render('update', [
				'model' => $model,
			]);
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
		$sql='select * from '.$this->currentTableName.' where id='.$id;
		
		$db = Yii::$app->db;
		$command = $db->createCommand($sql);
		return $command->queryOne();
		
		
	}
	
}

<?php

namespace backend\controllers;

use Yii;

use common\models\search\ChannelSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\VerbFilter;
use yii\helpers\VarDumper;
use TS\TController;
use common\models\Content;
use yii\web\HttpException;
use common\models\DefineModel;
use common\models\DefineTable;
use common\models\Channel;
use common\models\TplForm;
use common\lulu\LuLu;
use backend\base\BaseBackController;
/**
 * ChannelController implements the CRUD actions for Channel model.
 */
class ContentController extends BaseBackController
{
	private $defaultTableName='model_news4';
	
	private $currentTableName='model_news4';
	
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

	public function getFormatValue($array)
	{
		$ret='';
		foreach ($array as $name=>$value)
		{
			$ret.=$name.',';
		}
		return $ret;
	}
	
	public function getFlatValue($array)
	{
		$ret=0;
		foreach ($array as $name=>$alue)
		{
			$ret+=pow(2,$name-1);
		}
		return $ret;
	}
	/**
	 * Lists all Channel models.
	 * @return mixed
	 */
	public function actionIndex()
	{
		$currentChannel=new Channel;
		
		$channelTree=Channel::getChannelTree();
		
		$chnid = $this->getGetValue('chnid');
		
		if($chnid==null)
		{
			return $this->render('index', [
					'dataList'=>[],
					'chnid'=>0,
					'channelTree' => $channelTree,
					'currentChannel' => $currentChannel,
					]);
		}
		
		$currentChannel=Channel::find($chnid);
		
		$dataList=LuLu::getDataSourceFromChannel($chnid);
		
		return $this->render('index', [
			'dataList'=>$dataList,
			'chnid'=>$chnid,
			'channelTree' => $channelTree,
			'currentChannel'=>$currentChannel,
		]);
	}

	
	
	/**
	 * Displays a single Channel model.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionView($id)
	{
		$model=$this->findModel($id);
		return $this->render('view', [
			'model' => $model,
		]);
	}
	
	
	
	/**
	 * Creates a new Channel model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate()
	{				
		$chnId=$this->getGetValue('chnid');		
		if($chnId==null)
		{
			throw new HttpException(404,'Channel id is null');
		}
	
		$currentChannel=Channel::find($chnId);
		
		$formName='Content';
		
		if ($this->hasPostValue($formName)) {
			
			$this->currentTableName=$currentChannel->table_name;
			
			$columns=$this->getPostValue($formName);
			$columns['flag']=$this->getFlatValue($columns['flag']);
			$columns['title_format']=$this->getFormatValue($columns['title_format']);
			
			
			$db=Yii::$app->db;
			$command = $db->createCommand();
			$command->insert($this->currentTableName, $columns);
			$command->execute();
			
			return $this->redirect(['index', 'chnid' => $chnId]);
		} else {
			
			$tplBackForm='back_form_default';
			
			$tplFormModel=TplForm::find(['table_id'=>$currentChannel->table_id,'type'=>0]);
			if($tplFormModel)
			{
				$tplBackForm=$tplFormModel->file_name;
			}
			
			$model=[];
			return $this->render($tplBackForm, [
				'model' => $model,
				'chnid' => $chnId,
				'currentChannel'=>$currentChannel,
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

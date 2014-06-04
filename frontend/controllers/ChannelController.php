<?php

namespace frontend\controllers;

use Yii;
use common\models\Channel;
use common\models\search\ChannelSearch;

use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\VarDumper;
use yii\console\controllers\CacheController;

use common\models\DefineModel;
use common\models\DefineTable;
use frontend\base\BaseFrontController;



/**
 * ChannelController implements the CRUD actions for Channel model.
 */
class ChannelController extends BaseFrontController
{
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
		
		$dataList=Channel::getChannelTree();
		
		//Yii::info(VarDumper::dumpAsString($dataList));
		return $this->render('index', [
			
			'dataList' => $dataList,
		]);
	}

	
	

	
	
	/**
	 * Displays a single Channel model.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionView($id)
	{
		return $this->render('view', [
			'model' => $this->findModel($id),
		]);
	}

	/**
	 * Creates a new Channel model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate()
	{
		$model = new Channel;
		$treeList=self::getChannelTree();
		
		$modelList=DefineModel::findAll();		
		foreach ($modelList as $m)
		{
			$m->table_name=DefineTable::find($m->table_id)->label;
		}
		
		if ($model->load($_POST) && $model->save()) {
			return $this->redirect(['view', 'id' => $model->id]);
		} else {
			return $this->render('create', [
				'model' => $model,
				'treeList' => $treeList,
				'modelList' => $modelList,
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
		$model = $this->findModel($id);
		$treeList=self::getChannelTree();
		
		$modelList=DefineModel::findAll();
		foreach ($modelList as $m)
		{
			$m->table_name=DefineTable::find($m->table_id)->label;
		}
		
		if ($model->load($_POST) && $model->save()) {
			return $this->redirect(['view', 'id' => $model->id]);
		} else {
			return $this->render('update', [
				'model' => $model,
				'treeList' => $treeList,
				'modelList' => $modelList,
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
		$this->findModel($id)->delete();
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
		if (($model = Channel::find($id)) !== null) {
			return $model;
		} else {
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}
}

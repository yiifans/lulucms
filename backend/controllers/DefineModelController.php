<?php

namespace backend\controllers;

use common\models\DefineModel;
use common\models\search\DefineModelSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\VerbFilter;
use common\models\DefineTable;
use TS\TController;
use yii\web\HttpException;
use yii\base\Model;
use common\models\TplForm;
use backend\base\BaseBackController;
/**
 * DefineModelController implements the CRUD actions for DefineModel model.
 */
class DefineModelController extends BaseBackController
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
	 * Lists all DefineModel models.
	 * @return mixed
	 */
	public function actionIndex()
	{
		$tableId=$this->getGetValue('tbid');
		if($tableId==null)
		{
			
			throw new HttpException( 404, 'tbid is null' );
		}
		
		$dataList=DefineModel::findAll(['table_id'=>intval($tableId)]);
		
		$searchModel = new DefineModelSearch;
		$dataProvider = $searchModel->search($_GET);

		return $this->render('index', [
			'dataProvider' => $dataProvider,
			'searchModel' => $searchModel,
			'dataList' => $dataList,
			'tbid'=>$tableId,
		]);
	}

	/**
	 * Displays a single DefineModel model.
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
	 * Creates a new DefineModel model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate()
	{
		$model = new DefineModel;
		
		$tableId=$this->getGetValue('tbid');
		$model->table_id=$tableId;
		$model->table_name=DefineTable::find($tableId)->name_en;
		
		if ($model->load($_POST) && $model->save()) {
			return $this->redirect(['index', 'tbid' => $tableId]);
		} else {
			$frontTplFormList=TplForm::findAll(['type'=>1]);
			$backTplFormList=TplForm::findAll(['type'=>0]);
			
			return $this->render('create', [
				'model' => $model,
				'frontTplFormList'=>$frontTplFormList,
				'backTplFormList' => $backTplFormList,
			]);
		}
	}

	/**
	 * Updates an existing DefineModel model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionUpdate($id)
	{
		$tableId=$this->getGetValue('tbid');
		
		$model = $this->findModel($id);

		if ($model->load($_POST)) {			
			//$model->table_name=DefineTable::find($model->table_id)->name_en;
			$model->save();
			return $this->redirect(['index', 'tbid' => $model->table_id]);
		} else {
			$frontTplFormList=TplForm::findAll(['type'=>1]);
			$backTplFormList=TplForm::findAll(['type'=>0]);
			
			return $this->render('update', [
				'model' => $model,
				'frontTplFormList'=>$frontTplFormList,
				'backTplFormList' => $backTplFormList,
			]);
		}
	}

	/**
	 * Deletes an existing DefineModel model.
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
	 * Finds the DefineModel model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $id
	 * @return DefineModel the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id)
	{
		if (($model = DefineModel::find($id)) !== null) {
			return $model;
		} else {
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}
}

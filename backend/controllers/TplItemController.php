<?php

namespace backend\controllers;

use common\models\TplItem;
use common\models\search\TplItemSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\VerbFilter;
use common\models\TplItemCategory;

/**
 * TplItemController implements the CRUD actions for TplItem model.
 */
class TplItemController extends TplBase
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
	 * Lists all TplItem models.
	 * @return mixed
	 */
	public function actionIndex()
	{
		$searchModel = new TplItemSearch;
		$dataProvider = $searchModel->search($_GET);

		return $this->render('index', [
			'dataProvider' => $dataProvider,
			'searchModel' => $searchModel,
		]);
	}

	/**
	 * Displays a single TplItem model.
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
	 * Creates a new TplItem model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate()
	{
		$model = new TplItem;
		$model->file_path='content';
		$model->file_name='item_';
		
		if ($model->load($_POST) && $model->save()) {
			return $this->redirect(['index']);
		} else {
			$datas=TplItemCategory::findAll();
			$tplItemCategoryList=$this->arrayMap($datas, 'id', 'name',[0=>'请选择']);
			
			$modelList=$this->getModelList();
			
			return $this->render('create', [
				'model' => $model,
				'modelList'=>$modelList,
				'tplItemCategoryList' => $tplItemCategoryList,
			]);
		}
	}

	/**
	 * Updates an existing TplItem model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionUpdate($id)
	{
		$model = $this->findModel($id);

		if ($model->load($_POST) && $model->save()) {
			return $this->redirect(['index']);
		} else {
			$datas=TplItemCategory::findAll();
			$tplItemCategoryList=$this->arrayMap($datas, 'id', 'name',[0=>'请选择']);
				
			$modelList=$this->getModelList();
			
			return $this->render('update', [
				'model' => $model,
				'modelList'=>$modelList,
				'$tplItemCategoryList' => $tplItemCategoryList,
			]);
		}
	}

	/**
	 * Deletes an existing TplItem model.
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
	 * Finds the TplItem model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $id
	 * @return TplItem the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id)
	{
		if (($model = TplItem::find($id)) !== null) {
			return $model;
		} else {
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}
}

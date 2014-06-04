<?php

namespace backend\controllers;

use common\models\TplList;
use common\models\search\TplListSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\VerbFilter;
use backend\controllers\BaseBackController;
use common\models\TplListCategory;
use ts\helpers\TFileHelper;

/**
 * TplListController implements the CRUD actions for TplList model.
 */
class TplListController extends TplBase
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
	 * Lists all TplList models.
	 * @return mixed
	 */
	public function actionIndex()
	{
		$tplListList=$this->getTplListList();
		
		$searchModel = new TplListSearch;
		$dataProvider = $searchModel->search($_GET);

		return $this->render('index', [
			'tplListList' => $tplListList,
		]);
	}

	/**
	 * Displays a single TplList model.
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
	 * Creates a new TplList model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate()
	{
		$model = new TplList;
		$model->file_path='content';
		$model->file_name='list_';
		
		if ($model->load($_POST) && $model->save()) {
			$this->saveTplFileInFront($model);			
			
			return $this->redirect(['index']);
		} else {
			$datas=TplListCategory::findAll();
			$tplListCategoryList=$this->arrayMap($datas, 'id', 'name',[0=>'ÇëÑ¡Ôñ']);
			
			$tableList=$this->getTableList();
			
			return $this->render('create', [
				'model' => $model,
				'tableList' =>$tableList,
				'tplListCategoryList' => $tplListCategoryList,
			]);
		}
	}

	/**
	 * Updates an existing TplList model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionUpdate($id)
	{
		$model = $this->findModel($id);

		if ($model->load($_POST) && $model->save()) {
			$this->saveTplFileInFront($model);
			
			return $this->redirect(['index']);
		} else {
			$datas=TplListCategory::findAll();
			$tplListCategoryList=$this->arrayMap($datas, 'id', 'name',[0=>'ÇëÑ¡Ôñ']);
			
			$tableList=$this->getTableList();
			
			return $this->render('update', [
				'model' => $model,
				'tableList' =>$tableList,
				'tplListCategoryList' => $tplListCategoryList,
			]);
		}
	}

	/**
	 * Deletes an existing TplList model.
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
	 * Finds the TplList model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $id
	 * @return TplList the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id)
	{
		if (($model = TplList::find($id)) !== null) {
			return $model;
		} else {
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}
}

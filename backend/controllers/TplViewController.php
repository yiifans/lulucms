<?php

namespace backend\controllers;

use common\models\TplView;
use common\models\search\TplViewSearch;
use yii\web\NotFoundHttpException;
use common\models\TplViewCategory;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use components\LuLu;

/**
 * TplViewController implements the CRUD actions for TplView model.
 */
class TplViewController extends TplBase
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
	 * Lists all TplView models.
	 * @return mixed
	 */
	public function actionIndex()
	{
		$tplViewList=$this->getTplViewList();

		return $this->render('index', [
			'tplViewList' => $tplViewList,
		]);
	}

	/**
	 * Displays a single TplView model.
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
	 * Creates a new TplView model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate()
	{
		$model = new TplView;
		$model->file_path='content';
		$model->file_name='view_';
		
		if ($model->load($_POST) && $model->save()) {
			$this->saveTplFileInFront($model);
						
			return $this->redirect(['index']);
		} else {
			$datas=TplViewCategory::findAll();
			$tplViewCategoryList=$this->arrayMap($datas, 'id', 'name',[0=>'��ѡ��']);
			
			$tableList=$this->getTableList();
			
			return $this->render('create', [
				'model' => $model,
				'tableList' =>$tableList,
				'tplViewCategoryList'=>$tplViewCategoryList,
			]);
		}
	}

	/**
	 * Updates an existing TplView model.
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
			$datas=TplViewCategory::findAll();
			$tplViewCategoryList=$this->arrayMap($datas, 'id', 'name',[0=>'��ѡ��']);
			
			$tableList=$this->getTableList();
			
			return $this->render('update', [
				'model' => $model,
				'tableList' =>$tableList,
				'tplViewCategoryList'=>$tplViewCategoryList,
			]);
		}
	}

	/**
	 * Deletes an existing TplView model.
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
	 * Finds the TplView model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $id
	 * @return TplView the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id)
	{
		if (($model = TplView::find($id)) !== null) {
			return $model;
		} else {
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}
	
	
}

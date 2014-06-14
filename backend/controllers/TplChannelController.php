<?php

namespace backend\controllers;

use common\models\TplChannel;
use common\models\search\TplChannelSearch;

use yii\web\NotFoundHttpException;
use common\models\TplChannelCategory;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * TplChannelController implements the CRUD actions for TplChannel model.
 */
class TplChannelController extends TplBase
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
	 * Lists all TplChannel models.
	 * @return mixed
	 */
	public function actionIndex()
	{
		
		$dataList=$this->getTplChannelList();
		
		return $this->render('index', [
			'dataList'=>$dataList,
			
		]);
	}

	/**
	 * Displays a single TplChannel model.
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
	 * Creates a new TplChannel model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate()
	{
		$model = new TplChannel;
		$model->file_path='content';
		$model->file_name='channel_';
		
		if ($model->load($_POST) && $model->save()) {
			$this->saveTplFileInFront($model);
			
			return $this->redirect(['index']);
		} else {
			$datas=TplChannelCategory::findAll();
			$tplCoverCategoryList=$this->arrayMap($datas, 'id', 'name',[0=>'��ѡ��']);
			
			$tableList=$this->getTableList();
			
			return $this->render('create', [
				'model' => $model,
				'tableList' =>$tableList,
				'tplCoverCategoryList' => $tplCoverCategoryList,
			]);
		}
	}

	/**
	 * Updates an existing TplChannel model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionUpdate($id)
	{
		$model = $this->findModel($id);
		$model->file_path='content';
		
		if ($model->load($_POST) && $model->save()) {
			$this->saveTplFileInFront($model);
			
			return $this->redirect(['index']);
		} else {
			$datas=TplChannelCategory::findAll();
			$tplCoverCategoryList=$this->arrayMap($datas, 'id', 'name',[0=>'��ѡ��']);
			
			$tableList=$this->getTableList();
			
			return $this->render('update', [
				'model' => $model,
				'tableList' =>$tableList,
				'tplCoverCategoryList' => $tplCoverCategoryList,
			]);
		}
	}

	/**
	 * Deletes an existing TplChannel model.
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
	 * Finds the TplChannel model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $id
	 * @return TplChannel the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id)
	{
		if (($model = TplChannel::find($id)) !== null) {
			return $model;
		} else {
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}
}

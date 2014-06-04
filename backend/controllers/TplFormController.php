<?php

namespace backend\controllers;

use common\models\TplForm;
use common\models\search\TplFormSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\VerbFilter;
use backend\controllers\BaseBackController;
use common\models\TplFormCategory;

/**
 * TplFormController implements the CRUD actions for TplForm model.
 */
class TplFormController extends TplBase
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
	 * Lists all TplForm models.
	 * @return mixed
	 */
	public function actionIndex()
	{
		$formList=$this->getFormList();
	
		return $this->render('index', [
			'dataList' =>$formList,
		]);
	}

	/**
	 * Displays a single TplForm model.
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
	 * Creates a new TplForm model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate()
	{
		$model = new TplForm;
		$model->file_path='content';
		$model->file_name='form_';
				
		if ($model->load($_POST) && $model->save()) {
			if($model->type==1)
			{
				$this->saveTplFileInFront($model);
			}
			else 
			{
				$this->saveTplFileInBack($model);
			}
			
			return $this->redirect(['index']);
		} else {
			$datas=TplFormCategory::findAll();
			$tplFormCategoryList=$this->arrayMap($datas, 'id', 'name',[0=>'ÇëÑ¡Ôñ']);
			$tableList=$this->getTableList();
			
			return $this->render('create', [
				'model' => $model,
				'tplFormCategoryList' => $tplFormCategoryList,
				'tableList' =>$tableList,
			]);
		}
	}

	/**
	 * Updates an existing TplForm model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionUpdate($id)
	{
		$model = $this->findModel($id);

		if ($model->load($_POST) && $model->save()) {
			if($model->type==1)
			{
				$this->saveTplFileInFront($model);
			}
			else
			{
				$this->saveTplFileInBack($model);
			}
			return $this->redirect(['index']);
		} else {
			$datas=TplFormCategory::findAll();
			$tplFormCategoryList=$this->arrayMap($datas, 'id', 'name',[0=>'ÇëÑ¡Ôñ']);
			$tableList=$this->getTableList();
			
			return $this->render('update', [
				'model' => $model,
				'tplFormCategoryList' => $tplFormCategoryList,
				'tableList'=>$tableList,
			]);
		}
	}

	/**
	 * Deletes an existing TplForm model.
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
	 * Finds the TplForm model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $id
	 * @return TplForm the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id)
	{
		if (($model = TplForm::find($id)) !== null) {
			return $model;
		} else {
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}
}

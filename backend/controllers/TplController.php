<?php

namespace backend\controllers;

use common\models\TplCover;
use common\models\search\TplCoverSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\VerbFilter;
use backend\controllers\BaseBackController;
use ts\helpers\TFileHelper;
use backend\base\BaseBackController;
/**
 * TplCoverController implements the CRUD actions for TplCover model.
 */
class TplController extends BaseBackController
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
	 * Lists all TplCover models.
	 * @return mixed
	 */
	public function actionIndex()
	{
		$frontRoot=\Yii::getAlias('@frontend');
		$parentDirFull=$frontRoot.'\views';
		
		$parentDir=$this->getGetValue('d');
		if($parentDir=='')
		{
			$parentDir='.';
		}
		else 
		{
			$parentDirFull.=ltrim($parentDir,'.');
		}
		
		
		$dirs=scandir($parentDirFull);
		
		return $this -> render('index',['dirs'=>$dirs,'parentDir'=>$parentDir,'parentDirFull'=>$parentDirFull]);
		
		//echo $this->renderPartial('index');
	}

	/**
	 * Displays a single TplCover model.
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
	 * Creates a new TplCover model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate()
	{
		$model = new TplCover;

		if ($model->load($_POST) && $model->save()) {
			return $this->redirect(['view', 'id' => $model->id]);
		} else {
			$modelList=$this->getModelList();
			
			return $this->render('create', [
				'model' => $model,
				'modelList' =>$modelList,
			]);
		}
	}

	/**
	 * Updates an existing TplCover model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionUpdate()
	{
		$frontRoot=\Yii::getAlias('@frontend');
		$parentDirFull=$frontRoot.'\views';
		
		$file=$this->getGetValue('file');
		$filePath=$parentDirFull.$file;
		
		
		
		$model=[]; //= $this->findModel($id);
		
		
		$fileContent=$this->getPostValue('FileContent');
		if($fileContent!=null)
		{
			TFileHelper::writeFile($filePath, $fileContent);
		}
		else
		{
			$fileContent = TFileHelper::readFile($filePath);
		}
		
		
		return $this->render('update', [
				'model' => $model,
				'file'=>$file,
				'content'=>$fileContent,
				'isNewRecord'=>false,
				]);
		
	
	}

	/**
	 * Deletes an existing TplCover model.
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
	 * Finds the TplCover model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $id
	 * @return TplCover the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id)
	{
		if (($model = TplCover::find($id)) !== null) {
			return $model;
		} else {
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}
}

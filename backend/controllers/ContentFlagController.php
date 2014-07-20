<?php

namespace backend\controllers;

use Yii;
use common\models\ContentFlag;
use backend\base\BaseBackController;
use yii\web\NotFoundHttpException;
use components\LuLu;
use common\includes\CacheUtility;

/**
 * ContentFlagController implements the CRUD actions for ContentFlag model.
 */
class ContentFlagController extends BaseBackController
{

	
	public function actionIndex()
	{
		$query = ContentFlag::find();
		
		$locals = LuLu::getPagedRows($query, ['order' => 'value asc']);
		
		return $this->render('index', $locals);
	}

	/**
	 * Displays a single ContentFlag model.
	 * 
	 * @param string $id        	
	 * @return mixed
	 */
	public function actionView($id)
	{
		return $this->render('view', ['model' => $this->findModel($id)]);
	}

	/**
	 * Creates a new ContentFlag model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * 
	 * @return mixed
	 */
	public function actionCreate()
	{
		$model = new ContentFlag();
		
		if($model->load(Yii::$app->request->post()) && $model->save())
		{
			CacheUtility::createContentFlagCache();
			return $this->redirect(['index']);
		}
		else
		{
			return $this->render('create', ['model' => $model]);
		}
	}

	/**
	 * Updates an existing ContentFlag model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * 
	 * @param string $id        	
	 * @return mixed
	 */
	public function actionUpdate($id)
	{
		$model = $this->findModel($id);
		
		if($model->load(Yii::$app->request->post()) && $model->save())
		{
			CacheUtility::createContentFlagCache();
			return $this->redirect(['index']);
		}
		else
		{
			return $this->render('update', ['model' => $model]);
		}
	}

	/**
	 * Deletes an existing ContentFlag model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * 
	 * @param string $id        	
	 * @return mixed
	 */
	public function actionDelete($id)
	{
		$this->findModel($id)->delete();
		
		return $this->redirect(['index']);
	}

	/**
	 * Finds the ContentFlag model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * 
	 * @param string $id        	
	 * @return ContentFlag the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id)
	{
		if(($model = ContentFlag::findOne($id)) !== null)
		{
			return $model;
		}
		else
		{
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}
}

<?php

namespace backend\controllers;

use Yii;
use common\models\PageCategory;
use backend\base\BaseBackController;
use yii\web\NotFoundHttpException;
use components\LuLu;

/**
 * PageCategoryController implements the CRUD actions for PageCategory model.
 */
class PageCategoryController extends BaseBackController
{

	public function actionIndex()
	{
		$query = PageCategory::find();
		
		$locals = LuLu::getPagedRows($query,['order'=>'id desc']);
		
		return $this->render('index', $locals);
	}

	public function actionCreate()
	{
		$model = new PageCategory();
		
		if($model->load(Yii::$app->request->post()) && $model->save())
		{
			return $this->redirect(['index']);
		}
		else
		{
			$locals = [];
			$locals['model'] = $model;
			return $this->render('create', $locals);
		}
	}

	public function actionUpdate($id)
	{
		$model = $this->findModel($id);
		
		if($model->load(Yii::$app->request->post()) && $model->save())
		{
			return $this->redirect(['index']);
		}
		else
		{
			$locals = [];
			$locals['model'] = $model;
			return $this->render('update', $locals);
		}
	}

	public function actionDelete($id)
	{
		$this->findModel($id)->delete();
		
		return $this->redirect(['index']);
	}

	protected function findModel($id)
	{
		if(($model = PageCategory::findOne($id)) !== null)
		{
			return $model;
		}
		else
		{
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}
}

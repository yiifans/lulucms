<?php

namespace backend\controllers;

use Yii;
use backend\base\BaseBackController;
use yii\web\NotFoundHttpException;
use components\LuLu;
use common\models\config\SiteForm;
use common\models\config\SeoForm;
use common\models\config\ContentForm;
use common\models\config\Config;

class ConfigController extends BaseBackController
{

	public function actionSite()
	{
		$model = new SiteForm();
		
		if($model->load(Yii::$app->request->post()) && $model->save())
		{
			return $this->redirect(['index']);
		}
		else
		{
			$model->loadModel();
			
			$locals = [];
			$locals['model'] = $model;
			
			return $this->render('site', $locals);
		}
	}

	public function actionSeo()
	{
		$model = new SeoForm();
		
		if($model->load(Yii::$app->request->post()) && $model->save())
		{
			return $this->redirect(['index']);
		}
		else
		{
			$model->loadModel();
			
			$locals = [];
			$locals['model'] = $model;
			
			return $this->render('seo', $locals);
		}
	}

	public function actionContent()
	{
		$model = new ContentForm();
		
		if($model->load(Yii::$app->request->post()) && $model->save())
		{
			return $this->redirect(['index']);
		}
		else
		{
			$model->loadModel();
			
			$locals = [];
			$locals['model'] = $model;
			return $this->render('content', $locals);
		}
	}

	public function actionIndex()
	{
		$query = Config::find();
		
		$locals = LuLu::getPagedRows($query);
		
		return $this->render('index', $locals);
	}

	public function actionCreate()
	{
		$model = new Config();
		
		if($model->load(Yii::$app->request->post()) && $model->save())
		{
			return $this->redirect(['index']);
		}
		else
		{
			return $this->render('create', ['model' => $model]);
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
			return $this->render('update', ['model' => $model]);
		}
	}

	public function actionDelete($id)
	{
		$this->findModel($id)->delete();
		
		return $this->redirect(['index']);
	}

	protected function findModel($id)
	{
		if(($model = Config::findOne($id)) !== null)
		{
			return $model;
		}
		else
		{
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}
}

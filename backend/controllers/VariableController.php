<?php

namespace backend\controllers;

use Yii;
use common\models\Variable;
use backend\base\BaseBackController;
use yii\web\NotFoundHttpException;
use components\LuLu;
use common\includes\CacheUtility;

class VariableController extends BaseBackController
{

	public function actionIndex()
	{
		$query = Variable::find();
		
		$locals = LuLu::getPagedRows($query);
		
		return $this->render('index', $locals);
	}

	public function actionCreate()
	{
		$model = new Variable();
		
		if($model->load(Yii::$app->request->post()))
		{
			if($model->checkExist())
			{
				LuLu::setFalsh('warning', $model->id . '：已经存在');
				return $this->refresh();
			}
			$model->save();
			CacheUtility::createVariableCache();
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
		
		if($model->load(Yii::$app->request->post()))
		{
			if($model->checkExist())
			{
				LuLu::setFalsh('warning', $model->variable . '：已经存在');
				
				return $this->refresh();
			}
			$model->save();
			CacheUtility::createVariableCache();
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
		CacheUtility::createVariableCache();
		
		return $this->redirect(['index']);
	}

	protected function findModel($id)
	{
		if(($model = Variable::findOne($id)) !== null)
		{
			return $model;
		}
		else
		{
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}
}

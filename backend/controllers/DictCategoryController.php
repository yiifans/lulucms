<?php

namespace backend\controllers;

use Yii;
use common\models\DictCategory;
use backend\base\BaseBackController;
use yii\web\NotFoundHttpException;
use components\LuLu;
use common\models\Dict;

class DictCategoryController extends BaseBackController
{

	public function actionIndex()
	{
		$query = DictCategory::find();
		
		$locals = LuLu::getPagedRows($query);
		
		return $this->render('index', $locals);
	}

	public function actionCreate()
	{
		$model = new DictCategory();
		if($model->load(Yii::$app->request->post()))
		{
			if($model->checkExist())
			{
				LuLu::setFalsh('warning', $model->id . '：已经存在');
				return $this->refresh();
			}
			$model->save();
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
		if($model->load(Yii::$app->request->post()))
		{
			if($model->checkExist())
			{
				LuLu::setFalsh('warning', $model->id . '：已经存在');
				return $this->refresh();
			}
			if($model->oldAttributes['id'] !== $model->id)
			{
				Dict::updateAll(['category_id' => $model->id], ['category_id' => $model->oldAttributes['id']]);
			}
			$model->save();
			return $this->redirect(['index', 'id' => $model->id]);
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
		Dict::deleteAll(['category_id' => $id]);
		
		return $this->redirect(['index']);
	}

	protected function findModel($id)
	{
		if(($model = DictCategory::findOne($id)) !== null)
		{
			return $model;
		}
		else
		{
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}
}

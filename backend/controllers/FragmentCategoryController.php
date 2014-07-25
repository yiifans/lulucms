<?php

namespace backend\controllers;

use Yii;
use common\models\FragmentCategory;
use backend\base\BaseBackController;
use components\LuLu;
use yii\web\NotFoundHttpException;

/**
 * FragmentCategoryController implements the CRUD actions for FragmentCategory model.
 */
class FragmentCategoryController extends BaseBackController
{

	public function actionIndex($type)
	{
		$query = FragmentCategory::find()->where(['type' => $type]);
		
		$locals = LuLu::getPagedRows($query,['order'=>'id desc']);
		$locals['type'] = $type;
		return $this->render('index', $locals);
	}

	public function actionView($id)
	{
		$locals = [];
		$locals['model'] = $this->findModel($id);
		return $this->render('view', $locals);
	}

	public function actionCreate($type)
	{
		$model = new FragmentCategory();
		$model->type = $type;
		
		if($model->load(Yii::$app->request->post()) && $model->save())
		{
			return $this->redirect(['index', 'type' => $type]);
		}
		else
		{
			$locals = [];
			$locals['model'] = $model;
			$locals['type'] = $type;
			return $this->render('create', $locals);
		}
	}

	public function actionUpdate($id, $type)
	{
		$model = $this->findModel($id);
		$model->type = $type;
		
		if($model->load(Yii::$app->request->post()) && $model->save())
		{
			return $this->redirect(['index', 'type' => $type]);
		}
		else
		{
			$locals = [];
			$locals['model'] = $model;
			$locals['type'] = $type;
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
		if(($model = FragmentCategory::findOne($id)) !== null)
		{
			return $model;
		}
		else
		{
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}
}

<?php

namespace backend\controllers;

use Yii;
use common\models\Fragment1Data;
use backend\base\BaseBackController;
use yii\web\NotFoundHttpException;
use common\models\Fragment;
use components\LuLu;

class Fragment1DataController extends BaseBackController
{

	public function actionIndex($fraid)
	{
		$query = Fragment1Data::find()->where(['fragment_id' => $fraid]);
		
		$locals = LuLu::getPagedRows($query,['order'=>'id desc']);
		$locals['currentFragment'] = Fragment::findOne($fraid);
		return $this->render('index', $locals);
	}

	public function actionCreate($fraid)
	{
		$model = new Fragment1Data();
		$model->fragment_id = $fraid;
		
		if($model->load(Yii::$app->request->post()) && $model->save())
		{
			return $this->redirect(['index', 'fraid' => $fraid]);
		}
		else
		{
			$locals = [];
			$locals['model'] = $model;
			$locals['currentFragment'] = Fragment::findOne($fraid);
			return $this->render('create', $locals);
		}
	}

	public function actionUpdate($id, $fraid = null)
	{
		$model = $this->findModel($id);
		$fraid = $model->fragment_id;
		
		if($model->load(Yii::$app->request->post()) && $model->save())
		{
			return $this->redirect(['index', 'fraid' => $fraid]);
		}
		else
		{
			$locals = [];
			$locals['model'] = $model;
			$locals['currentFragment'] = Fragment::findOne($fraid);
			return $this->render('update', $locals);
		}
	}

	public function actionDelete($id, $fraid = null)
	{
		$model = $this->findModel($id);
		$model->delete();
		
		$fraid = $model->fragment_id;
		
		return $this->redirect(['index', 'fraid' => $fraid]);
	}

	protected function findModel($id)
	{
		if(($model = Fragment1Data::findOne($id)) !== null)
		{
			return $model;
		}
		else
		{
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}
}

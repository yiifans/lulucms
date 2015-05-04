<?php

namespace backend\controllers;

use Yii;
use common\models\Fragment;
use backend\base\BaseBackController;
use yii\web\NotFoundHttpException;
use components\LuLu;
use common\models\FragmentCategory;

/**
 * FragmentController implements the CRUD actions for Fragment model.
 */
class FragmentController extends BaseBackController
{

	public function actionIndex($type, $catid = 0)
	{
		$query = Fragment::find()->where(['type' => $type]);
		if($catid > 0)
		{
			$query->andWhere(['category_id' => $catid]);
		}
		$locals = LuLu::getPagedRows($query,['order'=>'id desc']);
		$locals['type'] = $type;
		return $this->render('index', $locals);
	}

	public function actionView($id)
	{
		return $this->render('view', ['model' => $this->findModel($id)]);
	}

	public function actionCreate($type)
	{
		$model = new Fragment();
		$model->type = $type;
		
		if($model->load(Yii::$app->request->post()) && $model->save())
		{
			return $this->redirect(['index', 'type' => $type]);
		}
		else
		{
			$locals = [];
			$locals['model'] = $model;
			$locals['categories'] = FragmentCategory::findAll(['type' => $type]);
			$locals['type'] = $type;
			return $this->render('create', $locals);
		}
	}

	public function actionUpdate($id, $type)
	{
		$model = $this->findModel($id);
		
		if($model->load(Yii::$app->request->post()) && $model->save())
		{
			return $this->redirect(['index', 'type' => $model->type]);
		}
		else
		{
			$locals = [];
			$locals['model'] = $model;
			$locals['categories'] = FragmentCategory::findAll(['type' => $type]);
			$locals['type'] = $type;
			return $this->render('update', $locals);
		}
	}

	public function actionDelete($id, $type)
	{
		Fragment::deleteData($id, $type);
		
		return $this->redirect(['index', 'type' => $type]);
	}

	protected function findModel($id)
	{
		if(($model = Fragment::findOne($id)) !== null)
		{
			return $model;
		}
		else
		{
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}
}

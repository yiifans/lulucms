<?php

namespace backend\controllers;

use Yii;
use common\models\Page;
use backend\base\BaseBackController;
use yii\web\NotFoundHttpException;
use components\LuLu;
use common\models\PageCategory;
use common\includes\CommonUtility;

class PageController extends BaseBackController
{

	public function actionIndex()
	{
		$query = Page::find();
		
		$locals = LuLu::getPagedRows($query,['order'=>'id desc']);
		
		return $this->render('index', $locals);
	}

	public function actionCreate($catid = 0)
	{
		$model = new Page();
		$model->category_id = $catid;
		
		if($model->load(Yii::$app->request->post()) && $model->save())
		{
			return $this->redirect(['index']);
		}
		else
		{
			$locals = [];
			$locals['model'] = $model;
			$locals['catid'] = $catid;
			$locals['categories'] = PageCategory::getAllCategories();
			$locals['tpls'] = CommonUtility::getFrontViews('page', 'detail_');
			
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
			$locals['catid'] = $model->category_id;
			$locals['categories'] = PageCategory::getAllCategories();
			$locals['tpls'] = CommonUtility::getFrontViews('page', 'detail_');
			
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
		if(($model = Page::findOne($id)) !== null)
		{
			return $model;
		}
		else
		{
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}
}

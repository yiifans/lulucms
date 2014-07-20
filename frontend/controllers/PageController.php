<?php

namespace frontend\controllers;

use Yii;
use common\models\Page;
use frontend\base\BaseFrontController;
use yii\web\NotFoundHttpException;
use components\LuLu;
use common\includes\CommonUtility;
use components\helpers\TFileHelper;
use common\models\PageCategory;

class PageController extends BaseFrontController
{

	public function actionIndex($catid = 0)
	{
		$view = LuLu::getView();
		
		$category = null;
		
		$query = Page::find()->where(['status' => 1]);
		if(intval($catid) > 0)
		{
			$query->andWhere(['category_id' => $catid]);
			
			$category = PageCategory::findOne($catid);
			if($category!==null)
			{
				$view->setTitle(empty($category['seo_title']) ? $category['name'] : $category['seo_title']);
				$view->setMetaTag('keywords', $category['seo_keywords']);
				$view->setMetaTag('description', $category['seo_description']);
				
				$view->addBreadcrumb('页面',['page/index']);
				$view->addBreadcrumb($category['name']);
			}
		}
		if($category==null)
		{
			$view->setTitle('页面');
			$view->addBreadcrumb('页面');
		}
		$locals = LuLu::getPagedRows($query);
		$locals['catid']=$catid;
		$locals['currentCategory']=$category;
		
		return $this->render('index', $locals);
	}

	public function actionDetail($id)
	{
		$view = LuLu::getView();
		
		$model = $this->findModel($id);
		
		
		$view->setTitle(empty($model['seo_title']) ? $model['title'] : $model['seo_title']);
		$view->setMetaTag('keywords', $model['seo_keywords']);
		$view->setMetaTag('description', $model['seo_description']);
		
		$view->addBreadcrumb('页面',['page/index']);
		$category = PageCategory::findOne($model->category_id);
		if($category!==null)
		{
			$view->addBreadcrumb($category['name'],['page/index','catid'=>$category['id']]);
		}
		$view->addBreadcrumb($model['title']);
		
		$locals = [];
		$locals['model'] = $model;
		$locals['catid']=$model->category_id;
		$locals['currentCategory']=$category;
		
		$detailTpl = $this->getDetailTpl($model['tpl']);
		return $this->render($detailTpl, $locals);
	}

	private function getDetailTpl($tpl)
	{
		$tplPath = CommonUtility::getThemePath(['page', $tpl]);
		if(TFileHelper::exist($tplPath))
		{
			return $tpl;
		}
		return 'detail_default';
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

<?php

namespace backend\controllers;

use common\models\TplCover;
use common\models\search\TplCoverSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use ts\helpers\TFileHelper;
use backend\base\BaseBackController;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * TplCoverController implements the CRUD actions for TplCover model.
 */
class AdminController extends BaseBackController
{
	public $layout='admin';
	
	public function actionIndex()
	{
		return $this->render('index');
	}
	
	public function actionWelcome()
	{
		$this->layout='main';
		return $this->render('welcome');
	}
	
	public function actionSys()
	{
		return $this->render('sys');
	}
	
	public function actionTaxonomy()
	{
		return $this->render('taxonomy');
	}
	
	public function actionContent()
	{
		return $this->render('content');
	}
	
	public function actionTpl()
	{
		return $this->render('tpl');
	}
	
	
}

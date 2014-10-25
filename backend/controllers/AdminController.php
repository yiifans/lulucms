<?php

namespace backend\controllers;

use Yii;
use backend\base\BaseBackController;
use backend\models\LoginForm;
use common\includes\CommonUtility;

class AdminController extends BaseBackController
{

	public $layout = 'admin';

	public function actionLogin()
	{
		$this->layout = false;
		
		if(! \Yii::$app->user->isGuest)
		{
			return $this->redirect(['admin/index']);
		}
		
		$model = new LoginForm();
		if($model->load($_POST) && $model->login())
		{
			return $this->redirect(['admin/index']);
		}
		else
		{
			return $this->render('login', ['model' => $model]);
		}
	}

	public function actionLogout()
	{
		Yii::$app->user->logout();
		return $this->redirect(['admin/login']);
	}

	public function actionWelcome()
	{
		$this->layout = 'main';
		return $this->render('welcome');
	}

	public function actionError()
	{
		$this->layout = 'main';
		$action = new \yii\web\ErrorAction('error', $this);
		return $action->run();
	}

	public function actionIndex()
	{
		return $this->render('index');
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
		$themes = CommonUtility::getFiles('themes', null,false);
		$locals=[];
		$locals['themes']=$themes;
		return $this->render('tpl',$locals);
	}
}

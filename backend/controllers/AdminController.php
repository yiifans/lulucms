<?php

namespace backend\controllers;

use backend\base\BaseBackController;

class AdminController extends BaseBackController
{

	public $layout = 'admin';

	public function actionIndex()
	{
		return $this->render('index');
	}

	public function actionWelcome()
	{
		$this->layout = 'main';
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

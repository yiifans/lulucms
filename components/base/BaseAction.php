<?php

namespace components\base;

use Yii;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\View;
use yii\base\Action;

/**
 * Site controller
 */
class BaseAction extends Action
{

	public function render($view, $params = [])
	{
		return $this->controller->render($view,$params);
	}
	
	public function redirect($url, $statusCode = 302)
	{
		return $this->controller->redirect($url,$statusCode);
	}
	
}

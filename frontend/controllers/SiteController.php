<?php

namespace frontend\controllers;

use Yii;
use common\models\LoginForm;
use frontend\models\ContactForm;
use common\models\User;
use yii\web\BadRequestHttpException;
use yii\helpers\Security;
use components\LuLu;
use frontend\base\BaseFrontController;
use frontend\models\SignupForm;
use common\includes\CommonUtility;

class SiteController extends BaseFrontController
{

	public function actionClose($message = null)
	{
		$this->layout = false;
		$this->setSeo();
		return $this->render('close');
	}

	public function actionIndex()
	{
		$this->setSeo();
		$params = [];
		return $this->render('index_', $params);
	}

	public function actionLogin()
	{
		if(! \Yii::$app->user->isGuest)
		{
			$this->goHome();
		}
		
		$model = new LoginForm();
		if($model->load($_POST) && $model->login())
		{
			return $this->goBack();
		}
		else
		{
			return $this->render('login', ['model' => $model]);
		}
	}

	public function actionLogout()
	{
		Yii::$app->user->logout();
		return $this->goHome();
	}

	public function actionContact()
	{
		$model = new ContactForm();
		if($model->load($_POST) && $model->contact(Yii::$app->params['adminEmail']))
		{
			Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
			return $this->refresh();
		}
		else
		{
			return $this->render('contact', ['model' => $model]);
		}
	}

	public function actionAbout()
	{
		return $this->render('about');
	}

	public function actionSignup()
	{
		$model = new SignupForm();
		if($model->load(Yii::$app->request->post()))
		{
			$user = $model->signup();
			if($user)
			{
				if(Yii::$app->getUser()->login($user))
				{
					return $this->goHome();
				}
			}
		}
		return $this->render('signup', ['model' => $model]);
	}

	public function actionRequestPasswordReset()
	{
		$model = new User();
		$model->scenario = 'requestPasswordResetToken';
		if($model->load($_POST) && $model->validate())
		{
			if($this->sendPasswordResetEmail($model->email))
			{
				Yii::$app->getSession()->setFlash('success', 'Check your email for further instructions.');
				return $this->goHome();
			}
			else
			{
				Yii::$app->getSession()->setFlash('error', 'There was an error sending email.');
			}
		}
		return $this->render('requestPasswordResetToken', ['model' => $model]);
	}

	public function actionResetPassword($token)
	{
		$model = User::find(['password_reset_token' => $token, 'status' => User::STATUS_ACTIVE]);
		
		if(! $model)
		{
			throw new BadRequestHttpException('Wrong password reset token.');
		}
		
		$model->scenario = 'resetPassword';
		if($model->load($_POST) && $model->save())
		{
			Yii::$app->getSession()->setFlash('success', 'New password was saved.');
			return $this->goHome();
		}
		
		return $this->render('resetPassword', ['model' => $model]);
	}

	private function sendPasswordResetEmail($email)
	{
		$user = User::find(['status' => User::STATUS_ACTIVE, 'email' => $email]);
		
		if(! $user)
		{
			return false;
		}
		
		$user->password_reset_token = Security::generateRandomKey();
		if($user->save(false))
		{
			return \Yii::$app->mail->compose('passwordResetToken', ['user' => $user])->setFrom([\Yii::$app->params['supportEmail'] => \Yii::$app->name . ' robot'])->setTo($email)->setSubject('Password reset for ' . \Yii::$app->name)->send();
		}
		
		return false;
	}

	private function setSeo()
	{
		$view = LuLu::getView();
		
		$title = CommonUtility::getCachedConfigValue('seo_title');
		if(empty($title))
		{
			$title = '首页——' . CommonUtility::getCachedConfigValue('seo_name');
		}
		$view->setTitle($title);
		$view->registerMetaTag(['name' => 'keywords', 'content' => CommonUtility::getCachedConfigValue('seo_keywords')]);
		$view->registerMetaTag(['name' => 'description', 'content' => CommonUtility::getCachedConfigValue('seo_description')]);
	}
}

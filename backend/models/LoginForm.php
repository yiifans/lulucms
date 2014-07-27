<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use common\models\User;

class LoginForm extends Model
{

	public $username = 'admin888';

	public $password = 'admin888';

	private $_user = false;

	public function rules()
	{
		return [
			[['username', 'password'], 'required'], 
			['password', 'validatePassword']
		];
	}

	public function validatePassword()
	{
		$user = $this->getUser();
		if(! $user || ! $user->validatePassword($this->password))
		{
			$this->addError('password', 'Incorrect username or password.');
		}
	}

	public function attributeLabels()
	{
		return [
			'username' => '用户名', 
			'password' => '密码',
		];
	}

	public function login()
	{
		if($this->validate())
		{
			return Yii::$app->user->login($this->getUser(), 0);
		}
		else
		{
			return false;
		}
	}

	private function getUser()
	{
		if($this->_user === false)
		{
			$this->_user = User::findByUsername($this->username);
		}
		return $this->_user;
	}
}

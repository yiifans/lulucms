<?php

namespace common\models\config;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 */
class ImageForm extends Model
{
	public $scope="site";
	
	public $site_name;	
	public $site_url;
	public $site_path;
	public $site_logo;
	public $site_icp;
	public $site_copyright;
	public $site_stats;
	public $site_status;
	public $site_status_message;
	public $site_admin_email;
	
	public $seo_title;
	public $seo_keywords;
	public $seo_description;
	
	public $user_xxx;
	
	public $attache_xxx;
	
	public $email_xxx;
	
	public $ftp_xxx;
	
	public $image_xxx;
	
	public $username;
	public $password;
	public $rememberMe = true;

	private $_user = false;

	/**
	 * @return array the validation rules.
	 */
	public function rules()
	{
		return [
			[['username', 'password'], 'required'],
			// password is validated by validatePassword()
			['password', 'validatePassword'],
			// rememberMe must be a boolean value
			['rememberMe', 'boolean'],
		];
	}

	/**
	 * Validates the password.
	 * This method serves as the inline validation for password.
	 */
	public function validatePassword()
	{
		$user = $this->getUser();
		if (!$user || !$user->validatePassword($this->password)) {
			$this->addError('password', 'Incorrect username or password.');
		}
	}

	/**
	 * Logs in a user using the provided username and password.
	 * @return boolean whether the user is logged in successfully
	 */
	public function login()
	{
		if ($this->validate()) {
			return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600*24*30 : 0);
		} else {
			return false;
		}
	}

	/**
	 * Finds user by [[username]]
	 *
	 * @return User|null
	 */
	private function getUser()
	{
		if ($this->_user === false) {
			$this->_user = User::findByUsername($this->username);
		}
		return $this->_user;
	}
}

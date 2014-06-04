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

/**
 * Site controller
 */
class BaseView extends View
{

	private $_cachedRoles;

	public function getCachedRoles()
	{
		if ($this->_cachedRoles == null)
		{
			$this->_cachedRoles = YiiForum::getAppParam('cachedRoles');
		}
		return $this->_cachedRoles;
	}

	private $_cachedRoleGroups;

	public function getCachedRoleGroups()
	{
		if ($this->_cachedRoleGroups == null)
		{
			$this->_cachedRoleGroups = YiiForum::getAppParam('cachedRoleGroups');
		}
		return $this->_cachedRoleGroups;
	}

	private $_cachedPermissions;

	public function getCachedPermissions()
	{
		if ($this->_cachedPermissions == null)
		{
			$this->_cachedPermissions = YiiForum::getAppParam('cachedPermissions');
		}
		return $this->_cachedPermissions;
	}

	private $_cachedPermissionCategories;

	public function getCachedPermissionCategories()
	{
		if ($this->_cachedPermissionCategories == null)
		{
			$this->_cachedPermissionCategories = YiiForum::getAppParam('cachedPermissionCategories');
		}
		return $this->_cachedPermissionCategories;
	}

	private $_cachedBoards;

	public function getCachedBoards()
	{
		if ($this->_cachedBoards == null)
		{
			$this->_cachedBoards = YiiForum::getAppParam('cachedBoards');
		}
		return $this->_cachedBoards;
	}

	public function addBreadcrumb()
	{
		$argsCount = func_num_args();
		$args = func_get_args();
		
		if ($argsCount == 1)
		{
			$this->params['breadcrumbs'][] = $args[0];
		}
		else 
			if ($argsCount == 2)
			{
				$this->params['breadcrumbs'][] = [
						'label' => $args[0],
						'url' => $args[1] 
				];
			}
	}
}

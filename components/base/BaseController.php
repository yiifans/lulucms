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
use yii\helpers\VarDumper;
use yii\data\Pagination;
use common\models\Board;

/**
 * Site controller
 */
class BaseController extends Controller
{

	private $_cachedRoles;

	public function getCachedRoles($roleName = null)
	{
		if ($this->_cachedRoles == null)
		{
			$this->_cachedRoles = YiiForum::getAppParam('cachedRoles');
		}
		if ($roleName !== null)
		{
			return $this->_cachedRoles[$roleName];
		}
		return $this->_cachedRoles;
	}

	public function getCachedRolesByGroup($groupName)
	{
		$groups = $this->getCachedRoleGroups();
		if ($groupName != null && isset($groups[$groupName]))
		{
			$items = [];
			$roles = $groups[$groupName]['roles'];
			foreach ( $roles as $role )
			{
				$items[$role] = $this->getCachedRoles($role);
			}
			return $items;
		}
		return false;
	}

	private $_cachedRoleGroups;

	public function getCachedRoleGroups($groupName = null)
	{
		if ($this->_cachedRoleGroups == null)
		{
			$this->_cachedRoleGroups = YiiForum::getAppParam('cachedRoleGroups');
		}
		if ($groupName !== null)
		{
			return $this->_cachedRoleGroups[$groupName];
		}
		return $this->_cachedRoleGroups;
	}

	private $_cachedPermissions;

	public function getCachedPermissions($permissionName = null)
	{
		if ($this->_cachedPermissions == null)
		{
			$this->_cachedPermissions = YiiForum::getAppParam('cachedPermissions');
		}
		if ($permissionName != null)
		{
			return $this->_cachedPermissions[$permissionName];
		}
		return $this->_cachedPermissions;
	}

	public function getCachedPermissionsByCategory($categoryName = null)
	{
		$categories = $this->getCachedPermissionCategories();
		if ($categoryName != null && isset($categories[$categoryName]))
		{
			$items = [];
			$permissions = $categories[$categoryName]['permissions'];
			foreach ( $permissions as $permission )
			{
				$items[$permission] = $this->getCachedPermissions($permission);
			}
			return $items;
		}
		return false;
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

	public function getBoard($id, $fromCache = True)
	{
		if ($fromCache)
		{
			$cahcedBoards = $this->getCachedBoards();
			return $cahcedBoards[$id];
		}
		
		return Board::findOne([
				'id' => $id 
		]);
	}

	public function noPermission()
	{
		return 'no permission';
	}
}

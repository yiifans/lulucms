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
use yii\rbac\DbManager;
use yii\db\Query;
use yii\db\Expression;

/**
 * Site controller
 */
class AuthManager extends DbManager
{

	public function updateItemParent($parentName, $childName, $newParentName)
	{
		$this->db->createCommand()->update($this->itemChildTable, [
				'parent' => $newParentName 
		], [
				'parent' => $parentName,
				'child' => $childName 
		])->execute();
	}

	public function getParent($name)
	{
		$query = (new Query())->select([
				'name',
				'type',
				'description',
				'rule_name',
				'data',
				'created_at',
				'updated_at' 
		])->from([
				$this->itemTable,
				$this->itemChildTable 
		])->where([
				'child' => $name,
				'name' => new Expression('parent') 
		]);
		
		$row = $query->one($this->db);
		
		return $this->populateItem($row);
	}

	/**
	 * @inheritdoc
	 */
	public function checkAccess($userId, $permissionName, $params = [])
	{
		// return true;
		$assignments = $this->getAssignments($userId);
		if (! isset($params['user']))
		{
			$params['user'] = $userId;
		}
		return $this->checkAccessRecursive($userId, $permissionName, $params, $assignments);
	}

	/**
	 * Performs access check for the specified user.
	 * This method is internally called by [[checkAccess()]].
	 * 
	 * @param string|integer $user
	 *        	the user ID. This should can be either an integer or a string representing
	 *        	the unique identifier of a user. See [[\yii\web\User::id]].
	 * @param string $itemName
	 *        	the name of the operation that need access check
	 * @param array $params
	 *        	name-value pairs that would be passed to rules associated
	 *        	with the tasks and roles assigned to the user. A param with name 'user' is added to this array,
	 *        	which holds the value of `$userId`.
	 * @param Assignment[] $assignments
	 *        	the assignments to the specified user
	 * @return boolean whether the operations can be performed by the user.
	 */
	protected function checkAccessRecursive($user, $itemName, $params, $assignments)
	{
		if (($item = $this->getItem($itemName)) === null)
		{
			return false;
		}
		
		Yii::trace($item instanceof Role ? "Checking role: $itemName" : "Checking permission: $itemName", __METHOD__);
		
		if (! $this->executeRule($item, $params))
		{
			return false;
		}
		
		if (isset($this->defaultRoles[$itemName]) || isset($assignments[$itemName]))
		{
			return true;
		}
		
		$query = new Query();
		$parents = $query->select([
				'parent' 
		])->from($this->itemChildTable)->where([
				'child' => $itemName 
		])->column($this->db);
		foreach ( $parents as $parent )
		{
			if ($this->checkAccessRecursive($user, $parent, $params, $assignments))
			{
				return true;
			}
		}
		
		return false;
	}
}

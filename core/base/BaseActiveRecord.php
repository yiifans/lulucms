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
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
use yii\base\InvalidConfigException;
use components\LuLu;

/**
 * Site controller
 */
class BaseActiveRecord extends ActiveRecord
{

	public static function findOne($condition=null, $order = null)
	{
		$query = static::find();
		if($condition==null)
		{
			if ($order !== null)
			{
				$query = $query->orderBy($order);
			}
			return $query->one();
		}
		
		if (ArrayHelper::isAssociative($condition))
		{
			// hash condition
			$ret = $query->andWhere($condition);
			if ($order !== null)
			{
				$ret = $ret->orderBy($order);
			}
			return $ret->one();
		}
		else
		{
			// query by primary key
			$primaryKey = static::primaryKey();
			if (isset($primaryKey[0]))
			{
				$ret = $query->andWhere([
						$primaryKey[0] => $condition 
				]);
				if ($order !== null)
				{
					$ret = $ret->orderBy($order);
				}
				return $ret->one();
			}
			else
			{
				throw new InvalidConfigException(get_called_class() . ' must have a primary key.');
			}
		}
	}

	public static function findAll($condition=null, $order = null)
	{
		$query = static::find();
		if($condition==null)
		{
			if ($order !== null)
			{
				$query = $query->orderBy($order);
			}
			return $query->all();
		}
		
		if (ArrayHelper::isAssociative($condition))
		{
			// hash condition
			$ret = $query->andWhere($condition);
			if ($order !== null)
			{
				$ret = $ret->orderBy($order);
			}
			return $ret->all();
		}
		else
		{
			// query by primary key(s)
			$primaryKey = static::primaryKey();
			if (isset($primaryKey[0]))
			{
				$ret = $query->andWhere([
						$primaryKey[0] => $condition 
				]);
				if ($order !== null)
				{
					$ret = $ret->orderBy($order);
				}
				return $ret->all();
			}
			else
			{
				throw new InvalidConfigException(get_called_class() . ' must have a primary key.');
			}
		}
	}

	public function afterValidate()
	{
		$errors = $this->getErrors();
		if(!empty($errors))
		{
			LuLu::info($this,'validate error:');
		}
		
	}
// 	public function beforeValidate()
// 	{
// 		if(parent::beforeValidate())
// 		{
// 			return true;
// 		}
// 		else 
// 		{
			
// 			return false;
// 		}
// 	}










}

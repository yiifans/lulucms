<?php

namespace components\base;

use Yii;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
use yii\base\InvalidConfigException;
use components\LuLu;
use components\helpers\TTimeHelper;

/**
 * Site controller
 */
class BaseActiveRecord extends ActiveRecord
{

	public static function findOne($condition = null, $order = null)
	{
		$query = static::find();
		if($condition == null)
		{
			if($order !== null)
			{
				$query = $query->orderBy($order);
			}
			return $query->one();
		}
		
		if(ArrayHelper::isAssociative($condition))
		{
			// hash condition
			$ret = $query->andWhere($condition);
			if($order !== null)
			{
				$ret = $ret->orderBy($order);
			}
			return $ret->one();
		}
		else
		{
			// query by primary key
			$primaryKey = static::primaryKey();
			if(isset($primaryKey[0]))
			{
				$ret = $query->andWhere([$primaryKey[0] => $condition]);
				if($order !== null)
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

	public static function findAll($condition = null, $order = null)
	{
		$query = static::find();
		if($condition == null)
		{
			if($order !== null)
			{
				$query = $query->orderBy($order);
			}
			return $query->all();
		}
		
		if(ArrayHelper::isAssociative($condition))
		{
			// hash condition
			$ret = $query->andWhere($condition);
			if($order !== null)
			{
				$ret = $ret->orderBy($order);
			}
			return $ret->all();
		}
		else
		{
			// query by primary key(s)
			$primaryKey = static::primaryKey();
			if(isset($primaryKey[0]))
			{
				$ret = $query->andWhere([$primaryKey[0] => $condition]);
				if($order !== null)
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

	public function beforeValidate()
	{
		if(parent::beforeValidate())
		{
			if($this->hasAttribute('sort_num'))
			{
				if($this->sort_num == null || $this->sort_num == '')
				{
					$this->sort_num = 0;
				}
			}
			if($this->hasAttribute('publish_time'))
			{
				if($this->publish_time == null || $this->publish_time == '')
				{
					$this->publish_time = TTimeHelper::getCurrentTime();
				}
			}
			if($this->hasAttribute('modify_time'))
			{
				if($this->modify_time == null || $this->modify_time == '')
				{
					$this->modify_time = TTimeHelper::getCurrentTime();
				}
			}
			return true;
		}
		return false;
	}

	public function afterValidate()
	{
		$errors = $this->getErrors();
		if(! empty($errors))
		{
			LuLu::info($this, 'validate error:');
		}
	}
}

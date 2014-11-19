<?php

namespace components;

use yii\helpers\VarDumper;
use Yii;
use yii\helpers\Url;
use yii\data\Pagination;
use components\helpers\TFileHelper;

class LuLu
{

	public static function getApp()
	{
		return \Yii::$app;
	}

	public static function getView()
	{
		$view = \Yii::$app->getView();
		return $view;
	}

	public static function getRequest()
	{
		return \Yii::$app->request;
	}

	public static function getResponse()
	{
		return \Yii::$app->response;
	}

	public static function getBaseUrl($url = null)
	{
		$baseUrl = \Yii::$app->request->getBaseUrl();
		if($url !== null)
		{
			$baseUrl .= $url;
		}
		return $baseUrl;
	}
	
	public static function getHomeUrl($url = null)
	{
		$homeUrl = \Yii::$app->getHomeUrl();
		if($url !== null)
		{
			$homeUrl .= $url;
		}
		return $homeUrl;
	}

	public static function getWebUrl($url = null)
	{
		$webUrl = \Yii::getAlias('@web');
		if($url !== null)
		{
			$webUrl .= $url;
		}
		return $webUrl;
	}

	public static function getWebPath($path = null)
	{
		$webPath = \Yii::getAlias('@webroot');
		if($path !== null)
		{
			$webPath .= $path;
		}
		return $webPath;
	}

	public static function getAppParam($key, $defaultValue = null)
	{
		$params = \Yii::$app->params;
		if(array_key_exists($key,$params))
		{
			return $params[$key];
		}
		return $defaultValue;
	}

	public static function setAppParam($array)
	{
		foreach($array as $key => $value)
		{
			\Yii::$app->params[$key] = $value;
		}
	}

	public static function getViewParam($key, $defaultValue = null)
	{
		$view = \Yii::$app->getView();
		if(isset($view->params[$key]))
		{
			return $view->params[$key];
		}
		return $defaultValue;
	}

	public static function setViewParam($array)
	{
		$view = \Yii::$app->getView();
		foreach($array as $name => $value)
		{
			$view->params[$name] = $value;
		}
	}

	public static function hasGetValue($key)
	{
		return isset($_GET[$key]);
	}

	public static function getGetValue($key, $default = NULL)
	{
		if(self::hasGetValue($key))
		{
			return $_GET[$key];
		}
		return $default;
	}

	public static function hasPostValue($key)
	{
		return isset($_POST[$key]);
	}

	public static function getPostValue($key, $default = NULL)
	{
		if(self::hasPostValue($key))
		{
			return $_POST[$key];
		}
		return $default;
	}

	public static function setFalsh($type, $message)
	{
		\Yii::$app->session->setFlash($type, $message);
	}

	public static function setWarningMessage($message)
	{
		\Yii::$app->session->setFlash('warning', $message);
	}

	public static function setSuccessMessage($message)
	{
		\Yii::$app->session->setFlash('success', $message);
	}

	public static function setErrorMessage($message)
	{
		\Yii::$app->session->setFlash('error', $message);
	}

	public static function info($var, $category = 'application')
	{
		$dump = VarDumper::dumpAsString($var);
		Yii::info($dump, $category);
	}

	public static function getUser()
	{
		return Yii::$app->user;
	}

	public static function getIdentity()
	{
		return Yii::$app->user->getIdentity();
	}

	public static function getIsGuest()
	{
		return Yii::$app->user->isGuest;
	}

	public static function checkIsGuest($loginUrl = null)
	{
		$isGuest = Yii::$app->user->isGuest;
		if($isGuest)
		{
			if($loginUrl == false)
			{
				return false;
			}
			if($loginUrl == null)
			{
				$loginUrl = ['site/login'];
			}
			return Yii::$app->getResponse()->redirect(Url::to($loginUrl), 302);
		}
		return true;
	}

	public static function checkAuth($permissionName, $params = [], $allowCaching = true)
	{
		$user = Yii::$app->user;
		return $user->can($permissionName, $params, $allowCaching);
	}

	public static function getDB()
	{
		return \Yii::$app->db;
	}

	public static function createCommand($sql = null)
	{
		$db = \Yii::$app->db;
		if($sql !== null)
		{
			return $db->createCommand($sql);
		}
		return $db->createCommand();
	}

	public static function execute($sql)
	{
		$db = \Yii::$app->db;
		$command = $db->createCommand($sql);
		return $command->execute();
	}

	public static function queryAll($sql)
	{
		$db = \Yii::$app->db;
		$command = $db->createCommand($sql);
		return $command->queryAll();
	}

	public static function queryOne($sql)
	{
		$db = \Yii::$app->db;
		$command = $db->createCommand($sql);
		return $command->queryOne();
	}

	public static function getPagedRows($query, $config = [])
	{
		$countQuery = clone $query;
		$pages = new Pagination(['totalCount' => $countQuery->count()]);
		if(isset($config['page']))
		{
			$pages->setPage($config['page'], true);
		}
		
		if(isset($config['pageSize']))
		{
			$pages->setPageSize($config['pageSize'], true);
		}
		
		$rows = $query->offset($pages->offset)->limit($pages->limit);
		
		if(isset($config['order']))
		{
			$rows = $rows->orderBy($config['order']);
		}
		$rows = $rows->all();
		
		$rowsLable = 'rows';
		$pagesLable = 'pages';
		
		if(isset($config['rows']))
		{
			$rowsLable = $config['rows'];
		}
		if(isset($config['pages']))
		{
			$pagesLable = $config['pages'];
		}
		
		$ret = [];
		$ret[$rowsLable] = $rows;
		$ret[$pagesLable] = $pages;
		
		return $ret;
	}
}




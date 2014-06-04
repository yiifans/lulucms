<?php

namespace components;


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
	
	public static function getHomeUrl($url = null)
	{
		$homeUrl = \Yii::$app->getHomeUrl();
		if ($url !== null)
		{
			$homeUrl .= $url;
		}
		return $homeUrl;
	}
	
	public static function getWebUrl($url = null)
	{
		$webUrl = \Yii::getAlias('@web');
		if ($url !== null)
		{
			$webUrl .= $url;
		}
		return $webUrl;
	}
	
	public static function getWebPath($path = null)
	{
		$webPath = \Yii::getAlias('@webroot');
		if ($path !== null)
		{
			$webPath .= $path;
		}
		return $webPath;
	}
	
	public static function getAppParam($key, $defaultValue = null)
	{
		$params = \Yii::$app->params;
		if (isset($params[$key]))
		{
			return $params[$key];
		}
		return $defaultValue;
	}
	
	public static function setAppParam($array)
	{
		foreach ( $array as $key => $value )
		{
			\Yii::$app->params[$key] = $value;
		}
	}
	
	public static function getViewParam($key, $defaultValue = null)
	{
		$view = \Yii::$app->getView();
		if (isset($view->params[$key]))
		{
			return $view->params[$key];
		}
		return $defaultValue;
	}
	
	public static function setViewParam($array)
	{
		$view = \Yii::$app->getView();
		foreach ( $array as $name => $value )
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
		if (self::hasGetValue($key))
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
		if (self::hasPostValue($key))
		{
			return $_POST[$key];
		}
		return $default;
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
	
	public static function checkIsGuest()
	{
		$isGuest = Yii::$app->user->isGuest;
		if ($isGuest)
		{
			return Yii::$app->getResponse()->redirect(Url::to([
					'site/login'
					]), 302);
		}
		return true;
	}
	
	public static function setFalsh($title, $message)
	{
		\Yii::$app->session->setFlash($title, $message);
	}
	
	public static function info($var, $category = 'application')
	{
		$dump = VarDumper::dumpAsString($var);
		Yii::info($category . $dump, $category);
	}
	
	public static function execute($sql)
	{
		$db = \Yii::$app->db;
		$command = $db->createCommand($sql);
		return $command->execute();
	}
	
	public static function getPagedRows($query, $config = [])
	{
		$countQuery = clone $query;
		$pages = new Pagination([
				'totalCount' => $countQuery->count()
				]);
		if (isset($config['pageSize']))
		{
			$pages->setPageSize($config['pageSize'], true);
		}
	
		$rows = $query->offset($pages->offset)->limit($pages->limit);
		if (isset($config['order']))
		{
			$rows = $rows->orderBy($config['order']);
		}
		$rows = $rows->all();
	
		$rowsLable = 'rows';
		$pagesLable = 'pages';
	
		if (isset($config['rows']))
		{
			$rowsLable = $config['rows'];
		}
		if (isset($config['pages']))
		{
			$pagesLable = $config['pages'];
		}
	
		$ret = [];
		$ret[$rowsLable] = $rows;
		$ret[$pagesLable] = $pages;
	
		return $ret;
	}
	
	public static function checkAuth($permissionName, $params = [], $allowCaching = true)
	{
		$user = Yii::$app->user;
		return $user->can($permissionName, $params, $allowCaching);
	}

	/*
	 * $dataType
	 * 0	array
	 * 1	channel
	 * 2	table
	 * 10	sql
	 * 
	 * $dataSource
	 * array,channel ids,table name,sql
	 * 
	 * $other
	 * $other['fields']='*'
	 * $other['where']='status=1'
	 * $other['order']='sort_num desc'
	 * $other['limit']='10'
	 * 
	 */
	
	

	public static function getDataSource($dataType,$dataSource,$other=[])
	{
		$ret=[];
		switch ($dataType)
		{
			case 0://array
				return $dataSource;
			case 1://channel
				$ret =self::getDataSourceFromChannel($dataSource,$other);
				break;
			case 2://table
				$sql=self::buildSql($dataSource,$other);
				$ret=self::queryData($sql);
				break;
			case 10://sql
				$ret=self::queryData($dataSource);
				break;
		}

		return $ret;
	}

	public static function getDataSourceFromChannel($channelId,$other=[])
	{
		$cachedChannel = \Yii::$app->getView()->params['cachedChannel'];

		$channelId=rtrim($channelId,',');

		if(intval($channelId))
		{
			$channel=$cachedChannel[$channelId];
				
			$tableName=$channel['table_name'];
				
			if($channel['is_leaf'])
			{
				$sql=self::buildSql($tableName,$other,'channel_id='.$channelId);
			}
			else
			{
				$leafIds=rtrim($channel['leaf_ids'],',');
				if($leafIds=='')
				{
					return [];
				}
				else
				{
					$sql=self::buildSql($tableName,$other,'channel_id in('.$leafIds.')');
				}
			}
		}
		else
		{
			$channelIdArray=explode(',', $channelId);
				
			$leafIds;
			foreach ($channelIdArray as $id)
			{
				$leafIds.=$cachedChannel[$id]['leaf_ids'];
			}
				
			$leafIdsArray=explode(',', rtrim($leafIds,','));
			$leafIdsArray=array_unique($leafIdsArray);
				
			$tableName=$cachedChannel[$leafIdsArray[0]]['table_id'];
			$leafIds=implode(',', $leafIdsArray);
				
			$sql=self::buildSql($tableName,$other,'channel_id in('.$leafIds.')');
		}

		return self::queryData($sql);
	}

	private static  function buildSql($tableName,$other=[],$where=null)
	{
		$fields = isset($other['fields']) ? $other['fields'] : '*';
		$sql = ' select '.$fields.' from '.$tableName.' where 1=1 ';
		if($where!==null)
		{
			$sql.=' and '.$where;
		}
		if(isset($other['where']))
		{
			$sql.=' and '.$other['where'];
		}
		if(isset($other['order']))
		{
			$sql.=' order by '.$other['order'];
		}
		else 
		{
			$sql.=' order by publish_time desc';
		}
		if(isset($other['limit']))
		{
			$sql.=' limit 0,'.$other['limit'];
		}
		else 
		{
			$sql.=' limit 0,10';
		}
		return $sql;
	}

	private static function queryData($sql)
	{
		$db = \Yii::$app->db;
		$command= $db->createCommand($sql);
		return $command->queryAll();
	}
}




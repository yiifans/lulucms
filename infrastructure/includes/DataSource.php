<?php

namespace common\includes;

use components\base\BaseActiveRecord;
use yii\helpers\Html;
use components\LuLu;
use yii\base\InvalidParamException;
use components\helpers\TStringHelper;
use yii\base\Object;
use components\helpers\TFileHelper;
use yii\db\Query;

class DataSource extends Object
{
	
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
	* $other['fields']='*';
	* $other['where']='status=1';
	* $other['order']='sort_num desc';
	* $other['offset']=0;
	* $other['limit']=10;
	*
	*/
	
	public static function getContent($dataType,$dataSource,$other=[])
	{
		$ret=[];
		switch ($dataType)
		{
			case 0://array
				return $dataSource;
			case 1://channel
				$ret = self::getContentByChannel($dataSource,$other);
				break;
			case 2://table
				$ret = self::getContentByTable($dataSource,$other);
				return $ret;
				break;
			case 10://sql
				$ret=LuLu::queryAll($dataSource);
				break;
		}
	
		return $ret;
	}
	
	public static function getContentByChannel($channelIds,$other=[])
	{
		$tableName = '';
		
		$where = '';
		
		$cachedChannels = LuLu::getAppParam('cachedChannels');
	
		if(intval($channelIds)>0)
		{
			$channel=$cachedChannels[$channelIds];
	
			$tableName=$channel['table'];
			
			if($channel['is_leaf'])
			{
				$where = 'channel_id='.$channelIds;
			}
			else
			{
				$leafIds=$channel['leaf_ids'];
				if($leafIds=='')
				{
					return [];
				}
				
				$where = 'channel_id in('.$leafIds.')';
			}
		}
		else
		{
			$channelIdArray=explode(',', $channelIds);
	
			$leafIds='';
			foreach ($channelIdArray as $id)
			{
				$leafIds.=$cachedChannels[$id]['leaf_ids'].',';
			}
	
			$leafIdsArray=explode(',', rtrim($leafIds,','));
			$leafIdsArray=array_unique($leafIdsArray);
			$leafIds=implode(',', $leafIdsArray);
			
			$tableName=$cachedChannels[$leafIdsArray[0]]['table'];
			$where = 'channel_id in('.$leafIds.')';
		}
		
		if(empty($tableName))
		{
			return [];
		}
		
		$query = self::buildContentQuery($tableName,$other,$where);
		
		return $query->all();
	}
	
	public static function getContentByTable($tableName,$other=[])
	{
		$query = self::buildContentQuery($tableName,$other);
		
		return $query->all();
	}
	
	public static function buildContentQuery($tableName, $other=[],$where=null)
	{
		$query = new Query();
		
		if(isset($other['fields']))
		{
			$query->select($other['fields']);
		}
		
		$query->from($tableName);
		
		if($where!==null)
		{
			$query -> andWhere($where);
		}
		if(isset($other['where']))
		{
			$query->andWhere($other['where']);
		}
		
		if(isset($other['order']))
		{
			$query->orderBy($other['order']);
		}
		else
		{
			$query->orderBy('publish_time desc');
		}
		
		if(isset($other['offset']))
		{
			$query->offset(intval($other['offset']));
		}
		else 
		{
			$query->offset(0);
		}
		
		if(isset($other['limit']))
		{
			$query->limit(intval($other['limit']));
		}
		else
		{
			$query->limit(10);
		}
		
		return $query;
	}
	
	public static function queryAll($sql)
	{
		return LuLu::queryAll($sql);
	}
	
// 	private static function buildSql($tableName,$other=[],$where=null)
// 	{
// 		$fields = isset($other['fields']) ? $other['fields'] : '*';
// 		$sql = ' select '.$fields.' from '.$tableName.' where 1=1 ';
// 		if($where!==null)
// 		{
// 			$sql.=' and '.$where;
// 		}
// 		if(isset($other['where']))
// 		{
// 			$sql.=' and '.$other['where'];
// 		}
// 		if(isset($other['order']))
// 		{
// 			$sql.=' order by '.$other['order'];
// 		}
// 		else
// 		{
// 			$sql.=' order by publish_time desc';
// 		}
// 		if(isset($other['limit']))
// 		{
// 			$sql.=' limit 0,'.$other['limit'];
// 		}
// 		else
// 		{
// 			$sql.=' limit 0,10';
// 		}
// 		return $sql;
// 	}
}
<?php

namespace common\includes;

use components\base\BaseActiveRecord;
use yii\helpers\Html;
use components\LuLu;
use yii\base\InvalidParamException;
use components\helpers\TStringHelper;
use yii\base\Object;
use components\helpers\TFileHelper;

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
	* $other['fields']='*'
	* $other['where']='status=1'
	* $other['order']='sort_num desc'
	* $other['limit']='10'
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
				$ret =self::getContentByChannel($dataSource,$other);
				break;
			case 2://table
				$sql=self::buildSql($dataSource,$other);
				$ret=LuLu::queryAll($sql);
				break;
			case 10://sql
				$ret=LuLu::queryAll($dataSource);
				break;
		}
	
		return $ret;
	}
	
	public static function getContentByChannel($channelIds,$other=[])
	{
		$cachedChannels = LuLu::getViewParam('cachedChannels');
	
		if(intval($channelIds))
		{
			$channel=$cachedChannels[$channelIds];
	
			$tableName=$channel['table'];
	
			if($channel['is_leaf'])
			{
				$sql=self::buildSql($tableName,$other,'channel_id='.$channelIds);
			}
			else
			{
				$leafIds=$channel['leaf_ids'];
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
				$leafIds.=$cachedChannels[$id]['leaf_ids'].',';
			}
	
			$leafIdsArray=explode(',', rtrim($leafIds,','));
			$leafIdsArray=array_unique($leafIdsArray);
	
			$tableName=$cachedChannels[$leafIdsArray[0]]['table'];
			$leafIds=implode(',', $leafIdsArray);
	
			$sql=self::buildSql($tableName,$other,'channel_id in('.$leafIds.')');
		}
	
		return LuLu::queryAll($sql);
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
}
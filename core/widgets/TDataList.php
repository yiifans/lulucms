<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace ts\widgets;

use yii\base\InvalidConfigException;
use yii\base\Widget;
use common\models\Catalog;


class TLoop extends TBaseWidget
{
	
	/*
	 * 0	array
	 * 1	channel
	 * 2	table
	 * 10	sql
	 * 
	 */
	public $dataType;
	
	public $dataSource;
	
	public $fields='*';
	public $where;
	public $order;
	public $limit=10;
	
	public $isCode=false;
	
	public $params = [];

	/**
	 * Starts recording a clip.
	 */
	public function init()
	{
		if ($this->dataSource === null && $this->tableName === null && $this->catalogId===null) {
			throw new InvalidConfigException('TLoop::dataSource or tableName or catalogId must be set.');
		}
		ob_start();
		ob_implicit_flush(false);
	}

	/**
	 * Ends recording a clip.
	 * This method stops output buffering and saves the rendering result as a named clip in the controller.
	 */
	public function run()
	{
		$ret='';
		$itemTpl=ob_get_clean();
		
		if($this->isCode)
		{
			$ret = $this ->withCode($itemTpl);
		}
		else 
		{
			$ret = $this->noCode($itemTpl);
		}
		echo $ret;
	}
	
	private function noCode($itemTpl)
	{
		$ret ='';
		
		preg_match_all('/{([\w]+)}/',$itemTpl,$out);
		$vars=array_unique($out[1]);
			
		foreach ($this->dataSource as $row)
		{
			$replaces=[];
			foreach ($vars as $var)
			{
				$replaces['{'.$var.'}']=$row[$var];
			}
			$item = strtr($itemTpl, $replaces);
			$ret.=$item;
		}
			
		return $ret;
	}
	
	private function withCode($itemTplVar)
	{				
		$ret='';
		$index=0;
		$count=count($this->dataSource);
		$isFirst=false;
		$isLast=false;
		
		foreach ($this->dataSource as $row)
		{
			if($index===0)
			{
				$isFirst=true;
			}
			else
			{
				$isFirst=false;
			}
			if($index==($count-1))
			{
				$isLast=true;
			}
			else 
			{
				$isLast=false;
			}
			
			eval($itemTplVar);
			
			preg_match_all('/{([\w]+)}/',$itemTpl,$out);
			$vars=array_unique($out[1]);
			
			$replaces=[];
			foreach ($vars as $var)
			{
				$replaces['{'.$var.'}']=$row[$var];
			}
			$item = strtr($itemTpl, $replaces);
			$ret.=$item;
			
			$index+=1;
		}
			
		return $ret;
	}
	
	private function getDataSource()
	{
		$ret=[];
		switch ($this->dataType)
		{
			case 0://array
				$ret = $this->dataSource;
			case 1://channel
				$ret =$this->getDataSourceFromChannel();
				break;
			case 2://table
				$sql=$this->buildSql($this->dataSource);
				$ret=$this->queryData($sql);
				break;
			case 10://sql
				$ret=$this->queryData($this->dataSource);
				break;
		}
		
		return $ret;
	}
	
	private function getDataSourceFromChannel()
	{
		$cachedChannel = $this->getView()->params['cachedChannel'];
		
		$channelId=rtrim($this->dataSource,'');
		if(intval($channelId))
		{
			$tableName=$cachedChannel[$channelId]['table_name'];
			if($cachedChannel[$channelId]['is_leaf'])
			{
				$sql=$this->buildSql($tableName,'channel_id='.$channelId);
				
			}
			else 
			{
				$leafIds=rtrim($cachedChannel[$channelId]['leaf_ids'],',');
				if($leafIds=='')
				{
					return [];
				}
				else 
				{
					$sql=$this->buildSql($tableName,'channel_id in('.$leafIds.')');
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
			
			$sql=$this->buildSql($tableName,'channel_id in('.$leafIds.')');
		}
		
		return $this->queryData($sql);
		
	}
	
	private function buildSql($tableName,$where=null)
	{
		$sql=' select '.($this->fields===null?'*':$this->fields).' from '.$tableName.' where 1=1 ';
		if($where!==null)
		{
			$sql.=' and '.$where;
		}
		if($this->where!==null)
		{
			$sql.=' and '.$this->where;
		}
		if($this->order!==null)
		{
			$sql.=' order by '.$this->order;
		}
		if($this->limit!==null && $this->limit>0)
		{
			$sql.=' limit 0,'.$this->limit;
		}
	}
	
	private function queryData($sql)
	{
		$db = \Yii::$app->db;
		$command= $db->createCommand($sql);
		return $command->queryAll();
	}
}

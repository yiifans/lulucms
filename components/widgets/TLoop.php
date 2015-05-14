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
	
	public $dataSource;
	
	public $tableName;
	public $catalogId;
	public $fields;
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
		if($this->dataSource!== null)
		{
			return $this->dataSource;
		}
		$_tableName=$this->tableName;
		if($_tableName==null)
		{
			$_catalogId=$this->catalogId;
			$catalogModel = Catalog::find($_catalogId);
		}
		$sql=' select '.($this->fields===null?'*':$this->fields).' from '.$_tableName;
		if($this->where!==null)
		{
			$sql.=' where '.$this->where;
		}
		if($this->order!==null)
		{
			$sql.=' order by '.$this->order;
		}
		if($this->limit!==null && $this->limit>0)
		{
			$sql.=' limit 0,'.$this->limit;
		}
		
		//$db=Yii::$app->db;
		
	}
}

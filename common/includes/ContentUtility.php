<?php

namespace common\includes;


use components\base\BaseActiveRecord;
use common\models\ContentFlag;

class ContentUtility 
{
	public static $format= ['b'=>'加粗','i'=>'斜体','u'=>'下划线','s'=>'删除线'];
	public static $status=['1'=>'通过','0'=>'待审核'];
	
	public static function getFormatValue($array)
	{
		$ret='';
		foreach ($array as $index=>$value)
		{
			$ret.=$value.',';
		}
		return $ret;
	}
	
	public static function getArrayFormat($format)
	{
		$titleFormat='';
		if(is_string($format))
		{
			$titleFormat=$format;
		}
		else 
		{
			$titleFormat=$format['title_format'];
		}
		
		return explode(',',trim($titleFormat,','));
	}
	
	public static function initFormat()
	{
		
	}
	public static function formatTitle($title,$format)
	{
		
	}
	
	public static function getFlags()
	{
		return ContentFlag::getFlags();
	}
	
	public static function getFlatValue($array)
	{
		if(!is_array($array))
		{
			return 0;
		}
	
		$ret=0;
		foreach ($array as $index=>$value)
		{
			$ret += intval($value);
		}
		return $ret;
	}
}

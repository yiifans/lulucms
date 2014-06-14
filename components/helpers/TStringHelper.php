<?php
namespace components\helpers;



class TStringHelper
{
	public static function parse2Array($str,$itemSep="\r\n",$valueSep='=>')
	{
		$source = explode($itemSep, $str);
		if(empty($source))
		{
			return [];
		}
		
		$items = [];
		
		foreach ($source as $itemString )
		{
			if(empty($itemString))
			{
				continue;
			}
		
			$itemArray=explode($valueSep, $itemString);
			$count = count($itemArray);
			if($count==0)
			{
				continue;
			}
				
			if($count==2)
			{
				$items[$itemArray[0]]=$itemArray[1];
			}
			else
			{
				$items[$itemArray[0]]=$itemArray[0];
			}
		}
		return $items;
	}
	public static function quotString($str)
	{
		return '\''.$str.'\'';
	}
	
	public static function  isNullOrEmpty($var)
	{
		if(!isset($var))
		{
			return true;
		}
		if($var==='')
		{
			return true;
		}
		return false;
	}
}
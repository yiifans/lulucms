<?php
namespace components\helpers;



class TStringHelper
{
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
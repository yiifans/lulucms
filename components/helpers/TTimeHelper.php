<?php
namespace components\helpers;

class TTimeHelper
{

	public static function getCurrentTime()
	{
		date_default_timezone_set('PRC');
		return date('Y-m-d H:i:s', time());
	}

	public static function showTime($time, $format = 'Y-m-d')
	{
		echo date($format, strtotime($time));
	}
}
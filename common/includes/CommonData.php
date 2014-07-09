<?php

namespace common\includes;

use Yii;


class CommonData 
{
	public static function getStatus($id=null)
	{
		$status = [
			'1'=>'发布',
			'0'=>'草稿',
		];
		
		if($id!==null&&isset($status[$id]))
		{
			return $status[$id];
		}
		
		return $status;
	}
   
	public static function getDataType($id=null)
	{
		$dataType= [
			'0'=>'字符串',
			'1'=>'数字',
			'2'=>'布尔型',
			'3'=>'日期',
			'4'=>'数组',
			'5'=>'JSON',
		];
		
		if($id!==null&&isset($dataType[$id]))
		{
			return $dataType[$id];
		}
		
		return $dataType;
	}
	
	
	
}

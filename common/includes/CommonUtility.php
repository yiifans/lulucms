<?php

namespace common\includes;


use components\base\BaseActiveRecord;
use common\models\ContentFlag;
use yii\web\UploadedFile;
use components\LuLu;

class CommonUtility 
{
	//数据类型
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
	
	//信息状态
	public static function getStatus($id=null)
	{
		$status = [
			'1'=>'通过',
			'0'=>'审核',
		];
	
		if($id!==null&&isset($status[$id]))
		{
			return $status[$id];
		}
	
		return $status;
	}
	 
	//标题格式
	public static function getTitleFormat($id=null)
	{
		$format = ['b'=>'加粗','i'=>'斜体','u'=>'下划线','s'=>'删除线'];
		
		if($id!=null)
		{
			if(isset($format[$id]))
			{
				return $format[$id];
			}
			return '';
		}
		return $format;
	}
	
	//标题格式值
	public static function getTitleFormatValue($array)
	{
		LuLu::info($array,__METHOD__);
		if($array==null||!is_array($array))
		{
			return '';
		}
		return implode(',', $array);
	}
	
	public static function getTitleFormatArray($var)
	{
		$format = '';
		//return isset($var['title_format']);
		if(is_string($var))
		{
			$format = $var;
		}
		else if(isset($var['title_format']))
		{
			$format = $var['title_format'];
		}
		
		return explode(',',trim($format,','));
	}
	
	public static function formatTitle($title,$format)
	{
		
	}
	
	public static function getFlag($id=null)
	{
		$flags = ContentFlag::getFlags();
		if($id!=null)
		{
			if(isset($flags[$id]))
			{
				return $flags[$id];
			}
			return '';
		}
		return $flags;
	}
	
	public static function getFlagValue($var)
	{
		if(is_string($var))
		{
			$var = explode(',', $var);
		}
		if(!is_array($var))
		{
			return 0;
		}
	
		$ret=0;
		foreach ($var as $value)
		{
			$ret += intval($value);
		}
		return $ret;
	}
	
	public static function getTitlePic($var)
	{
		$titlePic='';
		if(is_string($var))
		{
			$titlePic=$var;
		}
		else if(isset($var['title_pic']))
		{
			$titlePic=$var['title_pic'];
		}
		if(stripos($titlePic,'http')===false)
		{
			return 'data/'.$titlePic;
		}
		return $titlePic;
	}
	
	//碎片类型
	public static function getFragmentType($id=null)
	{
		$ret=[
			'1'=>'代码碎片',
			'2'=>'静态碎片',
			'3'=>'动态碎片',
		];
		if($id!=null)
		{
			if(isset($ret[$id]))
			{
				return $ret[$id];
			}
			return '';
		}
		return $ret;
	}	
	
	public static function uploadFile($name)
	{
		$uploadedFile = UploadedFile::getInstanceByName($name);
		
		if($uploadedFile==null||$uploadedFile->hasError)
		{
			return null;
		}
		
		$ymd = date("Ymd");
				
		$save_path=\Yii::getAlias('@data/attachment/image_test').'/'.$ymd . "/";
		$save_url='attachment/image/'.$ymd . "/";
	
		if (!file_exists($save_path)) {
			mkdir($save_path);
		}
	
		$file_name = $uploadedFile->getBaseName();
		$file_ext=$uploadedFile->getExtension();
		
		//新文件名
		$new_file_name = date("YmdHis") . '_' . rand(10000, 99999) . '.' . $file_ext;
	
		$uploadedFile->saveAs($save_path.$new_file_name);
		
		return [
			'path'=>$save_path,
			'url'=>$save_url,
			'name'=>$file_name,
			'new_name'=>$new_file_name,
			'ext'=>$file_ext,
		];
	}
}

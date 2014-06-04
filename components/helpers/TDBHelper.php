<?php
namespace components\helpers;



class TFileHelper
{
	public static function createFile($filePath,$content)
	{
		
	}
	
	public static function removeFile($filePath)
	{
		
	}
	
	public static function readFile($filePath)
	{
		return file_get_contents($filePath);
	}
	
	public static function writeFile($filePath,$content,$mode='w')
	{
		$f= fopen($filePath,$mode);
		fwrite($f,$content);
		fclose($f);
	}
	
	public static function createDir($dirPath)
	{
		
	}
	
	public static function removeDir($dirPath)
	{
		
	}
	
}
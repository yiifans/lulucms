<?php

namespace backend\modules\filemanager\models;

use Yii;
use yii\base\Model;

class FileForm extends Model
{

	public $name;

	public $currentDir;

	public $content;

	public function rules()
	{
		return [
			[['name', 'currentDir'], 'required'], 
			[['name', 'currentDir'], 'string'], 
			['content', 'string']
		];
	}

	public function attributeLabels()
	{
		return [
			'name' => '文件名', 
			'currentDir' => '文件路径', 
			'content' => '内容'
		];
	}
}

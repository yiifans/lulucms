<?php

namespace backend\modules\filemanager\models;

use Yii;
use yii\base\Model;

class DirForm extends Model
{

	public $oldName;

	public $newName;

	public $currentDir;

	public function rules()
	{
		return [
			[['oldName', 'newName', 'currentDir'], 'required'], 
			[['oldName', 'newName', 'currentDir'], 'string']
		];
	}

	public function attributeLabels()
	{
		return [
			'oldName' => '文件夹名', 
			'newName' => '新文件夹名', 
			'currentDir' => '路径',
		];
	}
}

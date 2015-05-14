<?php

namespace backend\modules\filemanager\controllers;

use yii\web\Controller;
use backend\modules\filemanager\models\FileForm;
use backend\modules\filemanager\models\DirForm;

class DefaultController extends Controller
{

	public $basePath = '@frontend';

	public $target = 'mainFrame';

	public function init()
	{
		parent::init();
		$this->basePath = \Yii::getAlias($this->basePath);
	}

	public function actionIndex()
	{
		$parentDir = $currentDir = $this->getCurrentDir();
		$dirName = $this->getQueryParam('name');
		if(! empty($dirName))
		{
			$currentDir = $this->append($currentDir) . $dirName;
		}
		
		if($currentDir !== DIRECTORY_SEPARATOR)
		{
			$lastDir = strrchr($currentDir, DIRECTORY_SEPARATOR);
			$parentDir = $lastDir === DIRECTORY_SEPARATOR ? DIRECTORY_SEPARATOR : str_replace($lastDir, '', $currentDir);
			$parentDir = $this->unshift($parentDir);
		}
		
		$files = scandir($this->basePath . $currentDir);
		
		$locals = [];
		$locals['basePath'] = $this->basePath;
		$locals['parentDir'] = $parentDir;
		$locals['currentDir'] = $currentDir;
		$locals['dirName'] = $dirName;
		$locals['files'] = $files;
		
		return $this->render('index', $locals);
	}

	public function actionCreate()
	{
		$currentDir = \Yii::$app->request->post('currentDir', '');
		$currentDir = $this->unshift($currentDir);
		
		if(\Yii::$app->request->isPost)
		{
			$dirName = \Yii::$app->request->post('dirName', '');
			if(! empty($dirName))
			{
				$path = $this->basePath . $this->append($currentDir) . $dirName;
				if(! is_dir($path))
				{
					mkdir($path);
				}
			}
		}
		$this->redirect(['index', 'currentdir' => $currentDir, 'target' => $this->target]);
	}

	public function actionEditDir()
	{
		$model = new DirForm();
		$model->currentDir = $this->getCurrentDir();
		$model->oldName = $this->getQueryParam('name');
		
		if($model->load(\Yii::$app->request->post()))
		{
			if($model->newName !== $model->oldName)
			{
				$fileDir = $this->basePath . $this->append($model->currentDir);
				
				$oldName = $fileDir . $model->oldName;
				$newName = $fileDir . $model->newName;
				
				$this->rename($oldName, $newName);
			}
			
			return $this->redirect(['index', 'currentdir' => $model->currentDir]);
		}
		
		$locals = [];
		$locals['model'] = $model;
		
		return $this->render('edit-dir', $locals);
	}

	public function actionEditFile()
	{
		$model = new FileForm();
		$model->currentDir = $this->getCurrentDir();
		$model->name = $this->getQueryParam('name');
		
		$fileDir = $this->basePath . $this->append($model->currentDir);
		
		if($model->load(\Yii::$app->request->post()))
		{
			$newName = $model->name;
			$oldName = $this->getQueryParam('name', '');
			
			if(! empty($oldName) && $oldName !== $newName)
			{
				$this->rename($fileDir . $oldName, $fileDir . $newName);
			}
			
			$this->writeFile($fileDir . $newName, $model->content);
			return $this->redirect(['index', 'currentdir' => $model->currentDir]);
		}
		else
		{
			if(! empty($model->name))
			{
				$model->content = $this->readFile($fileDir . $model->name);
			}
		}
		
		$locals = [];
		$locals['model'] = $model;
		
		return $this->render('edit-file', $locals);
	}

	public function actionDelete()
	{
		$currentDir = $this->getCurrentDir();
		$name = $this->getQueryParam('name');
		
		$path = $this->basePath . $this->append($currentDir) . $name;
		
		$this->delDir($path);
		
		$this->redirect(['index', 'currentdir' => $currentDir, 'target' => $this->target]);
	}

	private function readFile($filePath)
	{
		if(file_exists($filePath))
		{
			return file_get_contents($filePath);
		}
		return '';
	}

	private function writeFile($filePath, $content)
	{
		$mode = 'w';
		$f = fopen($filePath, $mode);
		fwrite($f, $content);
		fclose($f);
	}

	private function rename($oldName, $newName)
	{
		rename($oldName, $newName);
	}

	private function getQueryParam($key = null, $defaultValue = null)
	{
		return \Yii::$app->request->getQueryParam($key, $defaultValue);
	}

	private function getSeparator()
	{
		return DIRECTORY_SEPARATOR;
	}

	private function getCurrentDir()
	{
		$currentDir = $this->getQueryParam('currentdir', '');
		return $this->unshift($currentDir);
	}

	private function unshift($path)
	{
		if($path === null || empty($path))
		{
			return DIRECTORY_SEPARATOR;
		}
		
		if(substr($path, 0, 1) === DIRECTORY_SEPARATOR)
		{
			return $path;
		}
		
		return DIRECTORY_SEPARATOR . $path;
	}

	private function append($path)
	{
		if($path === null || empty($path))
		{
			return DIRECTORY_SEPARATOR;
		}
		
		if(substr($path, - 1) === DIRECTORY_SEPARATOR)
		{
			return $path;
		}
		
		return $path . DIRECTORY_SEPARATOR;
	}

	private function delDir($dirName)
	{
		if(! is_dir($dirName))
		{
			@unlink($dirName);
			return true;
		}
		$handle = opendir($dirName);
		if($handle)
		{
			while(false !== ($item = readdir($handle)))
			{
				if($item != "." && $item != "..")
				{
					$path = $dirName . DIRECTORY_SEPARATOR . $item;
					
					if(is_dir($path))
					{
						$this->delDir($path);
					}
					else
					{
						@unlink($path);
					}
				}
			}
			closedir($handle);
			rmdir($dirName);
		}
	}
}

<?php

namespace backend\base;

use Yii;

use yii\web;
use yii\web\Controller;
use yii\helpers\VarDumper;
use app\controllers\CatalogController;
use TS\TController;
use common\models\Catalog;
use common\models\DefineModel;
use common\models\DefineTable;
use common\models\TplList;
use common\models\TplView;
use common\models\TplForm;
use common\models\TplCover;
use ts\helpers\TFileHelper;
use common\models\TplChannel;
use common\models\Channel;
use components\base\BaseController;
use components\LuLu;
use yii\filters\VerbFilter;

class BaseBackController extends BaseController
{
	public function behaviors()
	{
		return [
		'verbs' => [
		'class' => VerbFilter::className(),
		'actions' => [
		'delete' => ['post'],
		],
		],
		];
	}
	
	public $cachedChannels;
	public $rootChannels;
	public $channelArrayTree;
	
	public function beforeAction($action)
	{
		//$this->info($action,__METHOD__);
	
		if(parent::beforeAction($action))
		{
			if($this->rootChannels == null)
			{
				$this->rootChannels = Channel::getRootChannels();
			}
			if($this->cachedChannels==null)
			{
				$this->cachedChannels=LuLu::getAppParam('cachedChannels');
			}
			if($this->channelArrayTree==null)
			{
				$this->channelArrayTree=Channel::getChannelArrayTree();
			}
		
				
			LuLu::setViewParam([
					'rootChannels' => $this->rootChannels,
					'cachedChannels' =>$this->cachedChannels,
					'channelArrayTree'=>$this->channelArrayTree,
					]);
	
			return true;
		}
		return false;
	}
	
	public function getTableName($tableId)
	{
		$model=DefineTable::findOne($tableId);
		if($model==null)
		{
			return 'unknow name('.$tableId.')';
		}
		return $model->name.'('.$tableId.')';
	}
	
	public function getTableList()
	{
		return DefineTable::findAll();
	}
	
	public function getTplChannelList()
	{
		$tplChannelList=TplChannel::findAll();
		foreach ($tplChannelList as $tplChannel)
		{
			$tplChannel->table_name=$this->getTableName($tplChannel->table_id);
		}
		return $tplChannelList;
	}
	
	public function getTplListList()
	{
		$tplListList=TplList::findAll();
		foreach ($tplListList as $tplList)
		{
			$tplList->table_name=$this->getTableName($tplList->table_id);
		}
	
		return $tplListList;
	}
	
	public function getTplViewList()
	{		
		$tplViewList=TplView::findAll();
		foreach ($tplViewList as $tplView)
		{
			$tplView->table_name=$this->getTableName($tplView->table_id);
		}
		return $tplViewList;
	}
	public function getFormList()
	{
		$tplFormList=TplForm::findAll();
		foreach ($tplFormList as $tplForm)
		{
			$tplForm->table_name=$this->getTableName($tplForm->table_id);
		}
		return $tplFormList;
	}
	
	
	
	public function saveTplFileInFront($model,$dir='content')
	{
		$rootFrontend = \Yii::getAlias('@frontend');
			
		$filePath=$rootFrontend.'/views/'.$dir.'/'.$model->file_name.'.php';
		$content=$model->file_content;
			
		TFileHelper::writeFile($filePath, $content);
	}
	public function saveTplFileInBack($model,$dir='content')
	{
		$rootFrontend = \Yii::getAlias('@backend');
			
		$filePath=$rootFrontend.'/views/'.$dir.'/'.$model->file_name.'.php';
		$content=$model->file_content;
			
		TFileHelper::writeFile($filePath, $content);
	}
	
}
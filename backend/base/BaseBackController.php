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
use common\models\Channel;
use components\base\BaseController;
use components\LuLu;
use yii\filters\VerbFilter;
use components\helpers\TFileHelper;

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
	
	
	
	public function getTableList()
	{
		return DefineTable::findAll();
	}
	
	
	
	
	
}
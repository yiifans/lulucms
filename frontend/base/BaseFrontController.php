<?php

namespace frontend\base;

use Yii;

use yii\web;
use yii\web\Controller;
use yii\helpers\VarDumper;

use TS\TController;
use common\models\Catalog;
use common\models\Channel;
use common\models\TplList;
use common\models\TplView;
use common\models\TplChannel;
use components\base\BaseController;
use components\LuLu;


class BaseFrontController extends BaseController
{
	
	public $cachedChannel=[];
	public $rootChannelList=[];
	
	public function beforeAction($action)
	{
		//$this->info($action,__METHOD__);
		
		if(parent::beforeAction($action))
		{
			$this->rootChannelList=Channel::findAll(['parent_id'=>0]);
			$this->cachedChannel=\Yii::$app->params['cachedChannel'];
			$channelTree=Channel::getChannelTree();
			
			LuLu::setViewParam([
					'rootChannelList' => $this->rootChannelList,
					'cachedChannel' =>$this->cachedChannel,
					'channelTree'=>$channelTree,
				]);
			
			//$this->info($this->getView()->params,__METHOD__);
			
			
			return true;
		}
		return false;
	}
	
	public function getTplChannel($chnId,$defaultView='')
	{
		$channelModel=$this->cachedChannel[$chnId];
	
		$tplChannelModel=TplChannel::findOne($channelModel['tpl_channel']);
		if($tplChannelModel==null)
		{
			return $defaultView;
		}
		return $tplChannelModel->file_name;
	}
	
	public function getTplList($chnId,$defaultView='')
	{
		$channelModel=$this->cachedChannel[$chnId];
		
		$tplListModel = TplList::findOne($channelModel['tpl_list']);
		if($tplListModel==null)
		{
			return $defaultView;
		}
		return $tplListModel->file_name;
	}
	
	public function getTplView($chnId,$defaultView='')
	{
		$channelModel=$this->cachedChannel[$chnId];
	
		$tplViewModel=TplView::findOne($channelModel['tpl_view']);
		if($tplViewModel==null)
		{
			return $defaultView;
		}
		return $tplViewModel->file_name;
	}
	
	
	
	
	
	
	
	
	
	
	
}
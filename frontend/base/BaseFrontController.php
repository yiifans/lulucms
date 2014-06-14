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
use components\helpers\TFileHelper;


class BaseFrontController extends BaseController
{
	
	public $cachedChannels=[];
	public $rootChannelList=[];
	
	public function beforeAction($action)
	{
		//$this->info($action,__METHOD__);
		
		if(parent::beforeAction($action))
		{
			$this->rootChannelList=Channel::findAll(['parent_id'=>0]);
			$this->cachedChannels=\Yii::$app->params['cachedChannels'];
			$channelArrayTree=Channel::getChannelArrayTree();
			
			LuLu::setViewParam([
					'rootChannelList' => $this->rootChannelList,
					'cachedChannels' =>$this->cachedChannels,
					'channelArrayTree'=>$channelArrayTree,
				]);
			
			//$this->info($this->getView()->params,__METHOD__);
			
			
			return true;
		}
		return false;
	}
	
	public function getTpl($chnId,$tplType)
	{
		$ret='';
		
		$frontend = \Yii::getAlias('@frontend');
		
		$channelModel=$this->cachedChannels[$chnId];
	
		$table = $channelModel['table'];
		$tplName = $channelModel[$tplType.'_tpl'];
		
		if(TFileHelper::exist([$frontend,'views','content', $table,$tplName]))
		{
			$ret = TFileHelper::buildPath([$table,$tplName],false);
		}
		else 
		{
			$ret = TFileHelper::buildPath(['model_default',$tplType.'_default'],false);
		}
		LuLu::info($table.$ret);
		return $ret;
	}
	
	public function getChannelTpl($chnId)
	{
		return $this->getTpl($chnId, 'channel');
	}
	
	public function getListTpl($chnId)
	{
		return $this->getTpl($chnId, 'list');
	}
	
	public function getDetailTpl($chnId)
	{
		return $this->getTpl($chnId, 'detail');
	}
	
	public function getFormTpl($chnId,$isCreateForm=true)
	{
		if($isCreateForm)
		{
			return $this->getTpl($chnId, 'create');
		}
		return $this->getTpl($chnId, 'update');
	}
	
	
	
	
	
	
	
	
	
	
}
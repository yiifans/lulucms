<?php

namespace frontend\actions\content;

use Yii;

use components\LuLu;
use common\models\DefineTableField;
use common\contentmodels\CommonContent;
use components\helpers\TTimeHelper;
use frontend\base\BaseFrontAction;
use components\helpers\TFileHelper;

/**
 * ChannelController implements the CRUD actions for Channel model.
 */
class ContentAction extends BaseFrontAction
{
	public $currentTableName='model_news4';

	
	public function initContent($model,$currentChannel)
	{
		$tableName = $currentChannel->table;
	
		$locals=[];
		$locals['model']= $model;
		$locals['chnid']=$currentChannel['id'];
		$locals['currentChannel']=$currentChannel;
		$locals['fields']=DefineTableField::findAll(['table'=>$tableName,'is_sys'=>0]);
	
		return $locals;
	}
	
	public function saveContent($model)
	{
		$model->removeSpecialAtt();
			
		LuLu::info($_POST);
			
		$model->user_id=1;
		$model->user_name='admin';
		$model->publish_time=TTimeHelper::getCurrentTime();
		$model->modify_time=TTimeHelper::getCurrentTime();
		$model->title_format=CommonContent::getFormatValue($model->title_format);
		$model->flag=CommonContent::getFlatValue($model->flag);
			
		$db=Yii::$app->db;
		$command = $db->createCommand();
		if($model->isNewRecord)
		{
			$command->insert($this->currentTableName, $model);
		}
		else
		{
			$command->update($this->currentTableName, $model,['id'=>$model['id']]);
		}
	
		$command->execute();
	}
	
	protected function findModel($id)
	{
		//CommonContent::
		$sql='select * from '.$this->currentTableName.' where id='.$id;
	
		$db = Yii::$app->db;
		$command = $db->createCommand($sql);
		return $command->queryOne();
	
	
	}
	
	public function getTpl($chnId,$tplName)
	{
		$ret = TFileHelper::buildPath(['model_default',$tplName],false);
	
		$cachedChannels = LuLu::getAppParam('cachedChannels');
	
		if(isset($cachedChannels[$chnId]))
		{
			$frontend = \Yii::getAlias('@frontend');
	
			$channelModel= $cachedChannels[$chnId];
	
			$table = $channelModel['table'];
			$tplPath = TFileHelper::buildPath([$frontend,'views','content', $table,$tplName.'.php'],false);
				
			if(TFileHelper::exist($tplPath))
			{
				$ret = TFileHelper::buildPath([$table,$tplName],false);
			}
			else
			{
				LuLu::info($tplPath.' does not exist',__METHOD__);
			}
		}
	
		return $ret;
	}
	
	
}

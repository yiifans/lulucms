<?php

namespace frontend\actions\content;

use Yii;
use components\LuLu;
use common\models\DefineTableField;
use common\contentmodels\CommonContent;
use components\helpers\TTimeHelper;
use frontend\base\BaseFrontAction;
use components\helpers\TFileHelper;
use common\includes\CommonUtility;

/**
 * ChannelController implements the CRUD actions for Channel model.
 */
class ContentAction extends BaseFrontAction
{

	public $currentTableName = 'model_news4';

	public function initContent($model, $currentChannel)
	{
		$tableName = $currentChannel->table;
		
		$locals = [];
		$locals['model'] = $model;
		$locals['chnid'] = $currentChannel['id'];
		$locals['currentChannel'] = $currentChannel;
		$locals['fields'] = DefineTableField::findAll(['table' => $tableName, 'is_sys' => 0]);
		
		return $locals;
	}

	public function saveContent($model)
	{
		$model->removeSpecialAtt();
		
		$model->user_id = 1;
		$model->user_name = 'admin';
		$model->publish_time = TTimeHelper::getCurrentTime();
		$model->modify_time = TTimeHelper::getCurrentTime();
		$model->title_format = CommonContent::getFormatValue($model->title_format);
		$model->flag = CommonContent::getFlatValue($model->flag);
		
		$db = Yii::$app->db;
		$command = $db->createCommand();
		if($model->isNewRecord)
		{
			$command->insert($this->currentTableName, $model);
		}
		else
		{
			$command->update($this->currentTableName, $model, ['id' => $model['id']]);
		}
		
		$command->execute();
	}

	protected function findModel($id)
	{
		$sql = 'select * from ' . $this->currentTableName . ' where id=' . $id;
		
		return LuLu::queryOne($sql);
	}

	protected function updateViews($id)
	{
		$sql = 'update ' . $this->currentTableName . ' set views=views+1 where id=' . $id;
		LuLu::execute($sql);
	}

	public function getTpl($chnId, $tplType)
	{
		$ret = TFileHelper::buildPath(['model_default', str_replace('_tpl', '_default', $tplType)]);
		
		$cachedChannels = LuLu::getAppParam('cachedChannels');
		
		if(isset($cachedChannels[$chnId]))
		{
			$channelModel = $cachedChannels[$chnId];
			
			$table = $channelModel['table'];
			$tplName = $channelModel[$tplType];
			
			$tplPath = CommonUtility::getThemePath(['content', $table, $tplName]);
			
			if(TFileHelper::exist($tplPath))
			{
				$ret = TFileHelper::buildPath([$table, $tplName]);
			}
			else
			{
				LuLu::info($tplPath . ' does not exist', __METHOD__);
			}
		}
		
		return $ret;
	}
}

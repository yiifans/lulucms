<?php

namespace backend\controllers;

use Yii;
use common\models\Channel;
use common\models\search\ChannelSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\helpers\VarDumper;
use yii\console\controllers\CacheController;
use common\models\DefineModel;
use common\models\DefineTable;
use common\models\TplList;
use common\models\TplView;
use backend\base\BaseBackController;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use components\helpers\TFileHelper;
use common\models\CacheDataManager;

/**
 * ChannelController implements the CRUD actions for Channel model.
 */
class ChannelController extends BaseBackController
{
	public $layout = 'left_taxonomy';
	

	/**
	 * Lists all Channel models.
	 * @return mixed
	 */
	public function actionIndex()
	{
		$locals=[];
		
		return $this->render('index', $locals);
	}

	
	/**
	 * Displays a single Channel model.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionView($id)
	{
		return $this->render('view', [
			'model' => $this->findModel($id),
		]);
	}

	private function getTpl($prefix)
	{
		$ret=[];
		
		$frontendRoot = \Yii::getAlias('@frontend');
		
		$contentPath = TFileHelper::buildPath([$frontendRoot,'views','content'],false,false);
		
		$fiels = TFileHelper::getFiles([$contentPath,'model_default'],$prefix);
		foreach ($fiels as $file)
		{
			$ret[]=['name'=>$file,'table'=>'model_default'];
		}
		
		$tables = DefineTable::getAllTables();
		
		foreach ($tables as $table)
		{
			$tableName = $table['name_en'];
			$modelPath = TFileHelper::buildPath([$contentPath,$tableName],false,false);
			if(!is_dir($modelPath))
			{
				continue;
			}
			$fiels = TFileHelper::getFiles([$contentPath,$tableName],$prefix);
			foreach ($fiels as $file)
			{
				$ret[]=['name'=>$file,'table'=>$tableName];	
			}
		}
		
		return $ret;
	}

	/**
	 * Creates a new Channel model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate()
	{
		$model = new Channel;
		$model->sort_num=0;
		
		if ($model->load($_POST)) {
			
			$model->save();
			
			CacheDataManager::createChannelCache();
			
			return $this->redirect(['index']);
		} else {
			$locals=[];
			$locals['model']=$model;
			$locals['tableList']=DefineTable::getAllTables();
			$locals['channelTpls']=$this->getTpl('channel');
			$locals['listTpls']=$this->getTpl('list');
			$locals['detailTpls']=$this->getTpl('detail');
			
			return $this->render('create', $locals);
		}
	}

	/**
	 * Updates an existing Channel model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionUpdate($id)
	{
		$model = $this->findModel($id);		
		
		if ($model->load($_POST)) {
			
			$parentIds = Channel::getParentIds($model['parent_id']);
				
			if (in_array($model['id'], $parentIds))
			{
				return $this->redirect([
						'update',
						'id' => $id,
						'message' => 1
						]);
			}
			
			$model->save();
			
			CacheDataManager::createChannelCache();
			
			return $this->redirect(['index']);
		} else {	
			$locals=[];
			$locals['model']=$model;
			$locals['tableList']=DefineTable::getAllTables();
			$locals['channelTpls']=$this->getTpl('channel');
			$locals['listTpls']=$this->getTpl('list');
			$locals['detailTpls']=$this->getTpl('detail');
			
			return $this->render('update', $locals);
		}
	}

	/**
	 * Deletes an existing Channel model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionDelete($id)
	{
		$this->findModel($id)->delete();
		CacheDataManager::createChannelCache();
		
		return $this->redirect(['index']);
	}

	/**
	 * Finds the Channel model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $id
	 * @return Channel the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id)
	{
		if (($model = Channel::findOne($id)) !== null) {
			return $model;
		} else {
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}
}

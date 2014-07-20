<?php

namespace backend\controllers;

use common\models\DefineTable;
use yii\web\NotFoundHttpException;
use common\models\DefineTableField;
use backend\base\BaseBackController;
use components\LuLu;
use common\includes\CacheUtility;
use common\includes\SqlData;

/**
 * DefineTableController implements the CRUD actions for DefineTable model.
 */
class DefineTableController extends BaseBackController
{

	private function addFields($tableModel)
	{
		$sortNum = 1;
		foreach(SqlData::$initFields as $field)
		{
			$model = new DefineTableField();
			$model->loadDefaultValues();
			$model->table = $tableModel->id;
			$model->name = $field['name'];
			$model->name_en = $field['name_en'];
			$model->type = $field['type'];
			$model->length = $field['length'];
			$model->is_null = $field['is_null'];
			$model->is_main = $field['is_main'];
			$model->is_sys = $field['is_sys'];
			$model->sort_num = $sortNum;
			$model->note = $field['name'];
			$model->front_form_type = '';
			$model->back_form_type = '';
			$model->save(false);
			$sortNum += 1;
		}
	}

	/**
	 * Lists all DefineTable models.
	 * 
	 * @return mixed
	 */
	public function actionIndex()
	{
		$rows = DefineTable::findAll();
		
		$locals = [];
		$locals['rows'] = $rows;
		return $this->render('index', $locals);
	}

	/**
	 * Displays a single DefineTable model.
	 * 
	 * @param integer $id        	
	 * @return mixed
	 */
	public function actionView($tb)
	{
		return $this->render('view', ['model' => $this->findModel($tb)]);
	}

	/**
	 * Creates a new DefineTable model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * 
	 * @return mixed
	 */
	public function actionCreate()
	{
		$model = new DefineTable();
		
		if($model->load($_POST) && $model->save())
		{
			$sql = SqlData::getCreateTableSql($model->id);
			LuLu::execute($sql);
			
			$this->addFields($model);
			
			CacheUtility::createTableCache();
			CacheUtility::createFieldCache();
			return $this->redirect(['index']);
		}
		else
		{
			$locals = [];
			$locals['model'] = $model;
			return $this->render('create', $locals);
		}
	}

	public function actionUpdate($tb)
	{
		$model = $this->findModel($tb);
		$model->loadDefaultValues();
		
		if($model->load($_POST) && $model->save())
		{
			CacheUtility::createTableCache();
			// CacheUtility::createFieldCache();
			return $this->redirect(['index']);
		}
		else
		{
			return $this->render('update', ['model' => $model]);
		}
	}

	public function actionAction($tb)
	{
		$model = $this->findModel($tb);
		
		if($model->load($_POST) && $model->save())
		{
			CacheUtility::createTableCache();
			// CacheUtility::createFieldCache();
			return $this->redirect(['index']);
		}
		else
		{
			return $this->render('action', ['model' => $model]);
		}
	}

	public function actionDelete($tb)
	{
		$model = $this->findModel($tb);
		$model->delete();
		
		DefineTableField::deleteAll(['table' => $tb]);
		
		$sql = SqlData::getDropTableSql($tb);
		LuLu::execute($sql);
		
		CacheUtility::createTableCache();
		CacheUtility::createFieldCache();
		
		return $this->redirect(['index']);
	}

	protected function findModel($tb)
	{
		if(($model = DefineTable::findOne($tb)) !== null)
		{
			return $model;
		}
		else
		{
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}
}

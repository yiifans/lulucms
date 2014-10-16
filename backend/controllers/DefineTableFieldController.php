<?php

namespace backend\controllers;

use common\models\DefineTableField;
use yii\web\NotFoundHttpException;
use backend\base\BaseBackController;
use components\LuLu;
use common\includes\CacheUtility;
use common\includes\SqlData;

/**
 * DefineTableFieldController implements the CRUD actions for DefineTableField model.
 */
class DefineTableFieldController extends BaseBackController
{

	public function actionIndex($tb)
	{
		$rows = DefineTableField::findAll(['table' => $tb]);
		
		$locals = [];
		$locals['table'] = $tb;
		$locals['rows'] = $rows;
		return $this->render('index', $locals);
	}

	public function actionView($id)
	{
		return $this->render('view', ['model' => $this->findModel($id)]);
	}


	public function actionCreate($tb)
	{
		$model = new DefineTableField();
		
		$model->table = $tb;
		
		if($model->load($_POST) && $model->save())
		{
			$fieldName = $model->field_name;
			$dataType = $model->getFieldType();
			$isNull = $model->is_null;
			
			$sql = SqlData::getAddFieldSql($tb, $fieldName, $dataType, $isNull);
			LuLu::execute($sql);
			
			CacheUtility::createFieldCache();
			return $this->redirect(['index', 'tb' => $tb]);
		}
		else
		{
			$locals = [];
			$locals['table'] = $tb;
			$locals['model'] = $model;
			return $this->render('create', $locals);
		}
	}

	
	public function actionUpdate($id)
	{
		$model = $this->findModel($id);
		
		if($model->load($_POST) && $model->save())
		{
			CacheUtility::createFieldCache();
			return $this->redirect(['index', 'tb' => $model->table]);
		}
		else
		{
			$locals = [];
			$locals['table'] = $model['table'];
			$locals['model'] = $model;
			return $this->render('update', $locals);
		}
	}

	public function actionDelete($id)
	{
		$model = $this->findModel($id);
		$model->delete();
		
		$sql = SqlData::getDropFieldSql($model->table, $model->field_name);
		// LuLu::execute($sql);
		CacheUtility::createFieldCache();
		return $this->redirect(['index', 'tb' => $model->table]);
	}

	protected function findModel($id)
	{
		if(($model = DefineTableField::findOne($id)) !== null)
		{
			return $model;
		}
		else
		{
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}
}

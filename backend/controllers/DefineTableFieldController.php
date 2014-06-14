<?php

namespace backend\controllers;

use common\models\DefineTableField;
use common\models\search\DefineTableFieldSearch;
use yii\web\NotFoundHttpException;
use common\models\DefineTable;
use yii\web\HttpException;
use backend\base\BaseBackController;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use components\LuLu;

/**
 * DefineTableFieldController implements the CRUD actions for DefineTableField model.
 */
class DefineTableFieldController extends BaseBackController
{

	
	

	/**
	 * Lists all DefineTableField models.
	 * @return mixed
	 */
	public function actionIndex($tb)
	{
		$rows=DefineTableField::findAll(['table'=>$tb]);
	
		$locals=[];
		$locals['table']=$tb;
		$locals['rows']=$rows;
		return $this->render('index', $locals);
	}

	/**
	 * Displays a single DefineTableField model.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionView($id)
	{
		return $this->render('view', [
			'model' => $this->findModel($id),
		]);
	}
	
	private function getDbType($model)
	{
		$type = $model->type;
		if($type=="VARCHAR" || $type=="CHAR")
		{
			return $type.'('.$model->length.')';
		}
		return $type;
	}
	
	
	
	public function actionCreate($tb)
	{
		$model = new DefineTableField;
		
		$model->table=$tb;
		
		if ($model->load($_POST) && $model->save()) {
					
			$fieldName=$model->name_en;
			$dataType=$model->getFieldType();		
			$isNull=$model->is_null;
			
			$sql = SqlData::getAddFieldSql($tb, $fieldName,$dataType,$isNull);
			LuLu::execute($sql);
			
			return $this->redirect(['index', 'tb' => $tb]);
		} else {
			$locals=[];
			$locals['table']=$tb;
			$locals['model']=$model;
			return $this->render('create', $locals);
		}
	}

	/**
	 * Updates an existing DefineTableField model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionUpdate($id)
	{
		$model = $this->findModel($id);

		if ($model->load($_POST) && $model->save()) {
			LuLu::info($model);
			return $this->redirect(['index', 'tb' => $model->table]);
		} else {
			$locals=[];
			$locals['table']=$model['table'];
			$locals['model']=$model;
			return $this->render('update', $locals);
		}
	}

	
	public function actionDelete($id)
	{
		$model =$this->findModel($id);
		$model->delete();
		
		$sql = SqlData::getDropFieldSql($model->table, $model->name_en);
		//LuLu::execute($sql);
		
		return $this->redirect(['index','tb'=>$model->table]);
	}

	protected function findModel($id)
	{
		if (($model = DefineTableField::findOne($id)) !== null) {
			return $model;
		} else {
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}
}

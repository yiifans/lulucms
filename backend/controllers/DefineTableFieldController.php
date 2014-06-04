<?php

namespace backend\controllers;

use common\models\DefineTableField;
use common\models\search\DefineTableFieldSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\VerbFilter;

use common\models\DefineTable;
use yii\helpers\VarDumper;
use yii\web\HttpException;
use backend\base\BaseBackController;
/**
 * DefineTableFieldController implements the CRUD actions for DefineTableField model.
 */
class DefineTableFieldController extends BaseBackController
{
	private $addFieldSql="ALTER TABLE  `{tablename}` ADD  `{fieldname}` {dbtype} NOT NULL ;";
	
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

	/**
	 * Lists all DefineTableField models.
	 * @return mixed
	 */
	public function actionIndex()
	{
		$tableId=$this->getGetValue('tbid');
		if($tableId==null)
		{
			throw new HttpException(404,'tbid is null');
		}	
		
		$q=[];
		$q['table_id']=intval($tableId);
		
		$dataList=DefineTableField::findAll($q);
	
	
		$searchModel = new DefineTableFieldSearch;
		$dataProvider = $searchModel->search($_GET);

		return $this->render('index', [
			'dataProvider' => $dataProvider,
			'searchModel' => $searchModel,
			'dataList' => $dataList,
			'tbid' => $tableId,
		]);
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
	private function getDBType($model)
	{
		$type=$model->type;
		if($type=="VARCHAR" || $type=="CHAR")
		{
			$length=$model->length;
			if(intval($length)<=0)
			{
				$type.='(255)';
			}
			else
			{
				$type.='('.$length.')';
			}
		}
		return $type;
	}
	/**
	 * Creates a new DefineTableField model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate()
	{
		$tableId=$this->getGetValue('tbid');
		
		$model = new DefineTableField;
		
		$model->table_id=$tableId;
		
		if ($model->load($_POST) && $model->save()) {
			
			$tableModel=DefineTable::find($tableId);	
					
			$tableName=$tableModel->name_en;			
			$fieldName=$model->name_en;
			$dataType=$this->getDBType($model);		
				
			$sql="ALTER TABLE  `".$tableName."` ADD  `".$fieldName."` ".$dataType." NOT NULL ;";
			$this->execute($sql);
			
			return $this->redirect(['index', 'tbid' => $tableId]);
		} else {
			return $this->render('create', [
				'model' => $model,
				'tbid' => $tableId,
			]);
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
			return $this->redirect(['view', 'id' => $model->id]);
		} else {
			return $this->render('update', [
				'model' => $model,
			]);
		}
	}

	/**
	 * Deletes an existing DefineTableField model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionDelete($id)
	{
		$this->findModel($id)->delete();
		return $this->redirect(['index']);
	}

	/**
	 * Finds the DefineTableField model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $id
	 * @return DefineTableField the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id)
	{
		if (($model = DefineTableField::find($id)) !== null) {
			return $model;
		} else {
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}
}

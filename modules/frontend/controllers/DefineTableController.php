<?php

namespace frontend\controllers;

use common\models\DefineTable;
use common\models\search\DefineTableSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\VerbFilter;
use frontend\base\BaseFrontController;



/**
 * DefineTableController implements the CRUD actions for DefineTable model.
 */
class DefineTableController extends BaseFrontController
{
	private  $createTableSql="CREATE TABLE IF NOT EXISTS `{tablename}` (
	  `id` int(11) NOT NULL AUTO_INCREMENT,
	  `catalog_id` int(11) NOT NULL,
	  `user_id` int(11) NOT NULL,
	  `username` varchar(80) NOT NULL,
	  `publish_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	  `is_headline` tinyint(4) NOT NULL,
	  `is_top` tinyint(4) NOT NULL,
	  `is_recommend` tinyint(4) NOT NULL,
	  `status` tinyint(1) NOT NULL,
	  `title` varchar(80) NOT NULL,
	  `title_format` varchar(80) NOT NULL,
	  `title_redirect_url` varchar(80) NOT NULL,
	  `title_pic` varchar(80) NOT NULL,
	  `note` varchar(80) NOT NULL,
	  `note2` varchar(80) NOT NULL,
	  PRIMARY KEY (`id`)
	) ENGINE=InnoDB DEFAULT CHARSET=gbk AUTO_INCREMENT=1 ;";
	
	private $renameTableSql="RENAME TABLE  `{oldtablename}` TO  `{newtablename}` ;";
	
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
	 * Lists all DefineTable models.
	 * @return mixed
	 */
	public function actionIndex()
	{
		$dataList= DefineTable::findAll();
		
		$searchModel = new DefineTableSearch;
		$dataProvider = $searchModel->search($_GET);

		return $this->render('index', [
			'dataProvider' => $dataProvider,
			'searchModel' => $searchModel,
			'dataList' => $dataList,
		]);
	}

	/**
	 * Displays a single DefineTable model.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionView($id)
	{
		return $this->render('view', [
			'model' => $this->findModel($id),
		]);
	}

	/**
	 * Creates a new DefineTable model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate()
	{
		$model = new DefineTable;

		if ($model->load($_POST) && $model->save()) {
			$tableName= $model->name;
				
			$sql=str_replace('{tablename}',$tableName,$this->createTableSql);
				
			$this->execute($sql);
			
			return $this->redirect(['view', 'id' => $model->id]);
		} else {
			return $this->render('create', [
				'model' => $model,
			]);
		}
	}

	/**
	 * Updates an existing DefineTable model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionUpdate($id)
	{
		$model = $this->findModel($id);

		$oldTableName=$model->name;
		
		if ($model->load($_POST) && $model->save()) {
			$newTableName=$model->name;
			if($newTableName!=$oldTableName)
			{
				$sql=str_replace('{oldtablename}', $oldTableName, $this->renameTableSql);
				$sql=str_replace('{newtablename}', $newTableName, $sql);
					
				$this->execute($sql);
			}
			
			return $this->redirect(['view', 'id' => $model->id]);
		} else {
			return $this->render('update', [
				'model' => $model,
			]);
		}
	}

	/**
	 * Deletes an existing DefineTable model.
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
	 * Finds the DefineTable model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $id
	 * @return DefineTable the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id)
	{
		if (($model = DefineTable::find($id)) !== null) {
			return $model;
		} else {
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}
	protected function  findModelByName($name)
	{
		if(($model = DefineTable::find(['name'=>$name]) !== null)){
			return $model;
		}else{
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}
	
	protected function  existsByName($name)
	{
		$model = DefineTable::find(['name'=>$name]);
		if($model==null){
			return false;
		}
		return  $model;
	}
	

}

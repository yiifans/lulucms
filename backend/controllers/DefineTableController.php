<?php

namespace backend\controllers;

use common\models\DefineTable;
use common\models\search\DefineTableSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\VerbFilter;
use TS\TController;
use ts\helpers\TFileHelper;
use common\models\DefineTableField;
use backend\base\BaseBackController;
/**
 * DefineTableController implements the CRUD actions for DefineTable model.
 */
class DefineTableController extends BaseBackController
{
	private  $createTableSql="CREATE TABLE IF NOT EXISTS `{tablename}` (
	  	`id` int(11) NOT NULL AUTO_INCREMENT,
	  	`channel_id` int(11) NOT NULL,
	  	`user_id` int(11) NOT NULL,
	  	`user_name` varchar(80) NOT NULL,
	  	`publish_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
		`edit_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	  	`att1` tinyint(4) NOT NULL,
	  	`att2` tinyint(4) NOT NULL,
	  	`att3` tinyint(4) NOT NULL,
		`flag` tinyint(4) NOT NULL,
	  	`status` tinyint(1) NOT NULL,
	  	`title` varchar(120) NOT NULL,
		`title_format` varchar(120) NULL,
	  	`title_pic` varchar(120) NULL,
		`redirect_url` varchar(120) NULL,
		`sub_title` varchar(120) NULL,	
		`keywords` varchar(120) NULL,
		`summary` varchar(500) NULL,
	  PRIMARY KEY (`id`)
	) ENGINE=InnoDB DEFAULT CHARSET=gbk AUTO_INCREMENT=1 ;";
	
	private $renameTableSql="RENAME TABLE  `{oldtablename}` TO  `{newtablename}` ;";
	
	private $fields=[
		['name'=>'����','name_en'=>'title','type'=>'varchar','length'=>120,'is_null'=>FALSE,'is_main'=>TRUE,'is_sys'=>TRUE,'sort_num'=>0,'note'=>'0'],
		['name'=>'�����ʽ','name_en'=>'title_format','type'=>'varchar','length'=>120,'is_null'=>TRUE,'is_main'=>TRUE,'is_sys'=>TRUE,'sort_num'=>0,'note'=>'0'],
		['name'=>'����ͼƬ','name_en'=>'title_pic','type'=>'varchar','length'=>120,'is_null'=>TRUE,'is_main'=>TRUE,'is_sys'=>TRUE,'sort_num'=>0,'note'=>'0'],
		['name'=>'��ת����','name_en'=>'redirect_url','type'=>'varchar','length'=>120,'is_null'=>TRUE,'is_main'=>TRUE,'is_sys'=>TRUE,'sort_num'=>0,'note'=>'0'],
		['name'=>'�ӱ���','name_en'=>'sub_title','type'=>'varchar','length'=>120,'is_null'=>TRUE,'is_main'=>TRUE,'is_sys'=>FALSE,'sort_num'=>0,'note'=>'0'],
		['name'=>'�ؼ���','name_en'=>'keywords','type'=>'varchar','length'=>120,'is_null'=>TRUE,'is_main'=>TRUE,'is_sys'=>FALSE,'sort_num'=>0,'note'=>'0'],
		['name'=>'���','name_en'=>'summary','type'=>'varchar','length'=>512,'is_null'=>TRUE,'is_main'=>TRUE,'is_sys'=>FALSE,'sort_num'=>0,'note'=>'0'],
	];
	
	private function addFields($tableModel)
	{
// 		* @property integer $id
// 		* @property integer $table_id
// 		* @property string $name
// 		* @property string $name_en
// 		* @property string $type
// 		* @property integer $length
// 		* @property integer $sort_num
// 		* @property string $note
		
		foreach ($this->fields as $field)
		{
			$model = new DefineTableField;
			$model->table_id=$tableModel->id;
			$model->name=$field['name'];
			$model->name_en=$field['name_en'];
			$model->type=$field['type'];
			$model->length=$field['length'];
			$model->sort_num=$field['sort_num'];
			$model->note=$field['note'];
			$model->save();
		}
		
	}
	
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

	public function saveFile($fileName)
	{
		$rootFrontend = \Yii::getAlias('@frontend');
			
		$filePath=$rootFrontend.'/views/content/'.$fileName.'.php';
		
		
		TFileHelper::writeFile($filePath, '');
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
			$tableName= $model->name_en;
				
			$sql=str_replace('{tablename}',$tableName,$this->createTableSql);
				
			$this->execute($sql);
			
			$this->addFields($model);
			
// 			$this->saveFile('channel_'.$tableName);
// 			$this->saveFile('list_'.$tableName);
// 			$this->saveFile('view_'.$tableName);
			
			return $this->redirect(['index']);
		} else {
			return $this->render('create', [
				'model' => $model,
			]);
		}
	}

	public function createChannelTpl()
	{
		
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
		$model=$this->findModel($id);
		
		$sql='DROP TABLE `'.$model->name_en.'`;';
		$this->execute($sql);
		
		$model->delete();
		
		DefineTableField::deleteAll(['table_id'=>$model->id]);
		
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

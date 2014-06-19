<?php

namespace backend\controllers;

use Yii;
use common\models\DictCategory;
use common\models\search\DictCategorySearch;
use backend\base\BaseBackController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use components\LuLu;
use common\models\Dict;

/**
 * DictCategoryController implements the CRUD actions for DictCategory model.
 */
class DictCategoryController extends BaseBackController
{
	public $layout='left_sys';
	
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
     * Lists all DictCategory models.
     * @return mixed
     */
    public function actionIndex()
    {
    	$query = Dict::find()->where(['parent_id'=>0]);
    	
    	$locals = LuLu::getPagedRows($query);
    	 
    	return $this->render('index', $locals);
    }

   /**
     * Creates a new Dict model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Dict;
		$model->parent_id=0;
        if ($model->load(Yii::$app->request->post())) {
        	$model->save(false);
        	LuLu::info($model);
            return $this->redirect(['index', 'id' => $model->id]);
        } else {
        	$locals=[];
        	$locals['model']=$model;
            return $this->render('create', $locals);
        }
    }

    /**
     * Updates an existing Dict model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->parent_id=0;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'id' => $model->id]);
        } else {
        	$locals=[];
        	$locals['model']=$model;
            return $this->render('update', $locals);
        }
    }

   
    
    /**
     * Deletes an existing Dict model.
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
     * Finds the Dict model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Dict the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Dict::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

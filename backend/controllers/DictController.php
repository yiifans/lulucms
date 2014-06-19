<?php

namespace backend\controllers;

use Yii;
use common\models\Dict;
use common\models\search\DictSearch;
use backend\base\BaseBackController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use components\LuLu;
use common\models\DictCategory;

/**
 * DictController implements the CRUD actions for Dict model.
 */
class DictController extends BaseBackController
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
     * Lists all Dict models.
     * @return mixed
     */
    public function actionIndex($pid)
    {
    	$query = Dict::find()->where(['parent_id'=>$pid]);
       
    	$locals = LuLu::getPagedRows($query);
    	$locals['pid']=$pid;
    	$locals['parent'] = Dict::findOne(['id'=>$pid]);
        return $this->render('index', $locals);
    }

    /**
     * Displays a single Dict model.
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
     * Creates a new Dict model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($pid)
    {
    	$parentDic = $this->findModel($pid);
    	
        $model = new Dict;
		$model->parent_id=$parentDic->id;
		$model->cache_key=$parentDic->cache_key;
		$model->is_sys=$parentDic->is_sys;
		
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'pid' => $pid]);
        } else {
        	$locals=[];
        	$locals['parent']=$parentDic;
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

        $parentDic = $this->findModel($model->parent_id);
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'pid' => $parentDic->id]);
        } else {
        	$locals=[];
        	$locals['parent']=$parentDic;
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

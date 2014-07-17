<?php

namespace backend\controllers;

use Yii;
use common\models\Fragment1Data;
use common\models\search\Fragment1DataSearch;
use backend\base\BaseBackController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Fragment;
use components\LuLu;
/**
 * Fragment1DataController implements the CRUD actions for Fragment1Data model.
 */
class Fragment1DataController extends BaseBackController
{

    /**
     * Lists all Fragment1Data models.
     * @return mixed
     */
    public function actionIndex($fraid)
    {
        $query = Fragment1Data::find()->where(['fragment_id'=>$fraid]);
		
    	$locals = LuLu::getPagedRows($query);
    	$locals['currentFragment']=Fragment::findOne($fraid);
        return $this->render('index', $locals);
    }

    /**
     * Displays a single Fragment1Data model.
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
     * Creates a new Fragment1Data model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($fraid)
    {
        $model = new Fragment1Data;
        $model->fragment_id=$fraid;
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'fraid' => $fraid]);
        } else {
        	$locals=[];
        	$locals['model']=$model;
        	$locals['currentFragment']=Fragment::findOne($fraid);
            return $this->render('create', $locals);
        }
    }

    /**
     * Updates an existing Fragment1Data model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id,$fraid=null)
    {
        $model = $this->findModel($id);
        $fraid=$model->fragment_id;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'fraid' => $fraid]);
        } else {
        	$locals=[];
        	$locals['model']=$model;
        	$locals['currentFragment']=Fragment::findOne($fraid);
            return $this->render('update', $locals);
        }
    }

    /**
     * Deletes an existing Fragment1Data model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id,$fraid=null)
    {
        $model=$this->findModel($id);
        $model->delete();
        
		$fraid=$model->fragment_id;
		
        return $this->redirect(['index', 'fraid' => $fraid]);
    }

    /**
     * Finds the Fragment1Data model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Fragment1Data the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Fragment1Data::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

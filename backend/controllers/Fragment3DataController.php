<?php

namespace backend\controllers;

use Yii;
use common\models\Fragment3Data;
use common\models\search\Fragment3DataSearch;
use backend\base\BaseBackController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Fragment;
use components\LuLu;

/**
 * Fragment3DataController implements the CRUD actions for Fragment3Data model.
 */
class Fragment3DataController extends BaseBackController
{
    /**
     * Lists all Fragment3Data models.
     * @return mixed
     */
    public function actionIndex($fraid)
    {
        $query = Fragment3Data::find()->where(['fragment_id'=>$fraid]);
		
    	$locals = LuLu::getPagedRows($query);
    	$locals['currentFragment']=Fragment::findOne($fraid);
        return $this->render('index', $locals);
    }

    /**
     * Displays a single Fragment3Data model.
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
     * Creates a new Fragment3Data model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($fraid)
    {
        $model = new Fragment3Data;
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
     * Updates an existing Fragment3Data model.
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
     * Deletes an existing Fragment3Data model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model=$this->findModel($id);
        $model->delete();
        
		$fraid=$model->fragment_id;
		
        return $this->redirect(['index', 'fraid' => $fraid]);
    }

    /**
     * Finds the Fragment3Data model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Fragment3Data the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Fragment3Data::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

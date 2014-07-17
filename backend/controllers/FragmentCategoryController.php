<?php

namespace backend\controllers;

use Yii;
use common\models\FragmentCategory;
use common\models\search\FragmentCategorySearch;
use backend\base\BaseBackController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use components\LuLu;

/**
 * FragmentCategoryController implements the CRUD actions for FragmentCategory model.
 */
class FragmentCategoryController extends BaseBackController
{
    /**
     * Lists all FragmentCategory models.
     * @return mixed
     */
    public function actionIndex($type)
    {
        $query = FragmentCategory::find()->where(['type'=>$type]);
		
    	$locals = LuLu::getPagedRows($query);
    	$locals['type']=$type;
        return $this->render('index', $locals);
    }

    /**
     * Displays a single FragmentCategory model.
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
     * Creates a new FragmentCategory model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($type)
    {
        $model = new FragmentCategory;
        $model->type=$type;
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'type' => $type]);
        } else {
            return $this->render('create', [
                'model' => $model,
            		'type'=>$type,
            ]);
        }
    }

    /**
     * Updates an existing FragmentCategory model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id,$type)
    {
        $model = $this->findModel($id);
        $model->type=$type;
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'type' => $type]);
        } else {
            return $this->render('update', [
                'model' => $model,
            		'type'=>$type,
            ]);
        }
    }

    /**
     * Deletes an existing FragmentCategory model.
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
     * Finds the FragmentCategory model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return FragmentCategory the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = FragmentCategory::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

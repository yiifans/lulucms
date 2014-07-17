<?php

namespace backend\controllers;

use Yii;
use common\models\Variable;
use common\models\search\Variable as VariableSearch;
use backend\base\BaseBackController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use components\LuLu;

/**
 * VariableController implements the CRUD actions for Variable model.
 */
class VariableController extends BaseBackController
{
   
	public $layout='left_sys';
	
    /**
     * Lists all Variable models.
     * @return mixed
     */
    public function actionIndex()
    {
    	$query = Variable::find();
    	 
    	$locals = LuLu::getPagedRows($query);
    	
    	return $this->render('index', $locals);
    }

    /**
     * Displays a single Variable model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Variable model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Variable;

        if ($model->load(Yii::$app->request->post())) {
        	if($model->checkExist())
        	{
        		LuLu::setFalsh('warning', $model->variable.'：已经存在');
        		return $this->refresh();
        	}
        	$model->save();
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Variable model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
        	if($model->checkExist())
        	{
        		LuLu::setFalsh('warning', $model->variable.'：已经存在');
        		
        		return $this->refresh();
        	}
        	$model->save();
        	return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Variable model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Variable model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Variable the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Variable::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

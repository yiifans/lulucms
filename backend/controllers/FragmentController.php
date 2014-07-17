<?php

namespace backend\controllers;

use Yii;
use common\models\Fragment;
use common\models\search\FragmentSearch;
use backend\base\BaseBackController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use components\LuLu;
use common\models\FragmentCategory;

/**
 * FragmentController implements the CRUD actions for Fragment model.
 */
class FragmentController extends BaseBackController
{
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
     * Lists all Fragment models.
     * @return mixed
     */
    public function actionIndex($type)
    {
        $query = Fragment::find()->where(['type'=>$type]);
		
    	$locals = LuLu::getPagedRows($query);
    	$locals['type']=$type;
        return $this->render('index', $locals);
    }

    /**
     * Displays a single Fragment model.
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
     * Creates a new Fragment model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($type)
    {
        $model = new Fragment;
		$model->type=$type;
		
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'type' => $type]);
        } else {
        	$locals=[];
        	$locals['model']=$model;
        	$locals['categories'] = FragmentCategory::findAll(['type'=>$type]);
        	$locals['type']=$type;
            return $this->render('create', $locals);
        }
    }

    /**
     * Updates an existing Fragment model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id,$type)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'type' => $model->type]);
        } else {
        	$locals=[];
        	$locals['model']=$model;
        	$locals['categories'] = FragmentCategory::findAll(['type'=>$type]);
        	$locals['type']=$type;
            return $this->render('update', $locals);
        }
    }

    /**
     * Deletes an existing Fragment model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id,$type)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index','type'=>$type]);
    }

    /**
     * Finds the Fragment model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Fragment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Fragment::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

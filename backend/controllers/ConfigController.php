<?php

namespace backend\controllers;

use Yii;
use common\models\Config;

use backend\base\BaseBackController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use components\LuLu;
use common\models\config\SiteForm;
use common\models\config\SeoForm;


/**
 * ConfigController implements the CRUD actions for Config model.
 */
class ConfigController extends BaseBackController
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

    public function actionSite()
    {
    	$model = new SiteForm();
    	
    	if ($model->load(Yii::$app->request->post()) && $model->save()) {
    		return $this->redirect(['index']);
    	} else {
    		$model->loadModel();
    		return $this->render('site', [
    				'model' => $model,
    				]);
    	}
    }
    
    public function actionSeo()
    {
    	$model = new SeoForm();
    	 
    	if ($model->load(Yii::$app->request->post()) && $model->save()) {
    		return $this->redirect(['index']);
    	} else {
    		$model->loadModel();
    		return $this->render('seo', [
    				'model' => $model,
    				]);
    	}
    }
    
    /**
     * Lists all Config models.
     * @return mixed
     */
    public function actionIndex()
    {
    	$query = Config::find();
    	
    	$locals = LuLu::getPagedRows($query);
    	
        return $this->render('index', $locals);
    }

    /**
     * Displays a single Config model.
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
     * Creates a new Config model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Config;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Config model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Config model.
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
     * Finds the Config model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Config the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Config::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

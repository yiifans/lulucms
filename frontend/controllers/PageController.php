<?php

namespace frontend\controllers;

use Yii;
use common\models\Page;
use common\models\search\PageSearch;
use frontend\base\BaseFrontController;
use yii\web\NotFoundHttpException;
use components\LuLu;
use common\models\PageCategory;

/**
 * PageController implements the CRUD actions for Page model.
 */
class PageController extends BaseFrontController
{
    /**
     * Lists all Page models.
     * @return mixed
     */
    public function actionIndex()
    {
        $query = Page::find();
		
    	$locals = LuLu::getPagedRows($query);
    	
        return $this->render('index', $locals);
    }

    /**
     * Displays a single Page model.
     * @param integer $id
     * @return mixed
     */
    public function actionDetail($id)
    {
        return $this->render('detail', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Page model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($catid=0)
    {
        $model = new Page;
		$model->category_id=$catid;
		
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
        	
            return $this->redirect(['index']);
        } else {
        	$locals=[];
        	$locals['model']=$model;
        	$locals['categories'] = PageCategory::getAllCategories();
        	$locals['tpls']=LuLu::getFrontViews('page', 'detail');
        	$locals['catid']=$catid;
        	
            return $this->render('create', $locals);
        }
    }

    /**
     * Updates an existing Page model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
        	$locals=[];
        	$locals['model']=$model;
        	$locals['categories'] = PageCategory::getAllCategories();
        	$locals['tpls']=LuLu::getFrontViews('page', 'detail');
        	
            return $this->render('update', $locals);
        }
    }

    /**
     * Deletes an existing Page model.
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
     * Finds the Page model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Page the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Page::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

<?php

namespace backend\controllers;

use Yii;
use common\models\Dict;
use backend\base\BaseBackController;
use yii\web\NotFoundHttpException;
use components\LuLu;
use common\models\DictCategory;
use common\includes\CacheUtility;

/**
 * DictController implements the CRUD actions for Dict model.
 */
class DictController extends BaseBackController
{

    public function actionIndex($catid,$pid=0)
    {
    	$query = Dict::find()->where(['parent_id'=>$pid,'category_id'=>$catid]);
       
    	$locals = LuLu::getPagedRows($query,['order'=>'sort_num asc']);
    	$locals['pid']=$pid;
    	$locals['parent'] = $this->findModel($pid);
    	$locals['parents'] = Dict::getParents($pid);
    	$locals['category']=DictCategory::findOne($catid);
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


    public function actionCreate($catid, $pid=0)
    {
        $model = new Dict;
		$model->parent_id=$pid;
		$model->category_id=$catid;
		
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'pid' => $pid, 'catid'=>$catid]);
        } else {
        	$locals=[];
        	$locals['model']=$model;
        	$locals['parent']=$this->findModel($pid);
        	$locals['parents'] = Dict::getParents($pid);
        	$locals['category']=DictCategory::findOne($catid);
            return $this->render('create', $locals);
        }
    }


    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
		$pid = $model->parent_id;
		$catid=$model->category_id;
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
        	CacheUtility::createDictCache();
            return $this->redirect(['index', 'pid' => $pid, 'catid'=>$catid]);
        } else {
        	$locals=[];
        	$locals['model']=$model;
        	$locals['parent']=$this->findModel($pid);
        	$locals['parents'] = Dict::getParents($pid);
        	$locals['category']=DictCategory::findOne($catid);
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
    	$id=intval($id);
    	
    	if($id===0)
    	{
    		$model = new Dict();
    		$model->id=0;
    		$model->name='根字典';
    		return $model;
    	}
    	
        if (($model = Dict::findOne($id)) !== null) {
            return $model;
        } else {
            //throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

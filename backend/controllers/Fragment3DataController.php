<?php

namespace backend\controllers;

use Yii;
use common\models\Fragment3Data;
use backend\base\BaseBackController;
use yii\web\NotFoundHttpException;
use common\models\Fragment;
use components\LuLu;
use common\includes\DataSource;

class Fragment3DataController extends BaseBackController
{

	public function actionIndex($fraid)
	{
		$query = Fragment3Data::find()->where(['fragment_id' => $fraid]);
		
		$locals = LuLu::getPagedRows($query, ['order' => 'id desc']);
		
		$ret = [];
		foreach($locals['rows'] as $row)
		{
			$id = $row['id'];
			$ret[$id] = ['id' => $row['id'], 'channel_id' => $row['channel_id'], 'content_id' => $row['content_id'], 'sort_num' => $row['sort_num']];
			
			$item = DataSource::getContentByChannel($row['channel_id'], ['where' => 'id=' . $row['content_id']]);
			if($item == null || empty($item))
			{
				$ret[$id]['title'] = '没有此数据';
			}
			else
			{
				$ret[$id]['title'] = $item[0]['title'];
			}
		}
		$locals['rows'] = $ret;
		$locals['currentFragment'] = Fragment::findOne($fraid);
		return $this->render('index', $locals);
	}

	public function actionCreate($fraid)
	{
		$model = new Fragment3Data();
		$model->fragment_id = $fraid;
		
		if($model->load(Yii::$app->request->post()) && $model->save())
		{
			return $this->redirect(['index', 'fraid' => $fraid]);
		}
		else
		{
			$locals = [];
			$locals['model'] = $model;
			$locals['currentFragment'] = Fragment::findOne($fraid);
			return $this->render('create', $locals);
		}
	}

	public function actionUpdate($id, $fraid = null)
	{
		$model = $this->findModel($id);
		$fraid = $model->fragment_id;
		
		if($model->load(Yii::$app->request->post()) && $model->save())
		{
			return $this->redirect(['index', 'fraid' => $fraid]);
		}
		else
		{
			$locals = [];
			$locals['model'] = $model;
			$locals['currentFragment'] = Fragment::findOne($fraid);
			return $this->render('update', $locals);
		}
	}

	public function actionDelete($id)
	{
		$model = $this->findModel($id);
		$model->delete();
		
		$fraid = $model->fragment_id;
		
		return $this->redirect(['index', 'fraid' => $fraid]);
	}

	protected function findModel($id)
	{
		if(($model = Fragment3Data::findOne($id)) !== null)
		{
			return $model;
		}
		else
		{
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}
}

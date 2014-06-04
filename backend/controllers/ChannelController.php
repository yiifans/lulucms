<?php

namespace backend\controllers;

use Yii;
use common\models\Channel;
use common\models\search\ChannelSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\VerbFilter;
use yii\helpers\VarDumper;
use yii\console\controllers\CacheController;
use common\models\DefineModel;
use common\models\DefineTable;
use common\models\TplList;
use common\models\TplView;
use ts\helpers\TFileHelper;
use backend\base\BaseBackController;



/**
 * ChannelController implements the CRUD actions for Channel model.
 */
class ChannelController extends BaseBackController
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
	 * Lists all Channel models.
	 * @return mixed
	 */
	public function actionIndex()
	{
		
		$dataList=Channel::getChannelTree();
		
		//
		return $this->render('index', [
			
			'dataList' => $dataList,
		]);
	}

	
	/**
	 * Displays a single Channel model.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionView($id)
	{
		return $this->render('view', [
			'model' => $this->findModel($id),
		]);
	}

	public function getString($str)
	{
		return '\''.$str.'\'';
	}
	
	/**
	 * Creates a new Channel model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate()
	{
		$model = new Channel;
		$model->sort_num=0;
		
		if ($model->load($_POST)) {
			$parentChannel=Channel::find($model->parent_id);
			if($parentChannel==null)
			{
				$model->parent_ids='0,';				
				$model->level=0;
			}
			else 
			{
				$model->parent_ids=$parentChannel->parent_ids.$parentChannel->id.',';				
				$model->level=$parentChannel->level+1;
			}
			$tableModel=DefineTable::find($model->table_id);
			//$this->info($table,__METHOD__);
			$model->table_name=$tableModel->name_en;
			$model->child_ids='';
			$model->leaf_ids='';
			$model->save();
			
			if($parentChannel!==null)
			{
				$this->addChildIds($parentChannel->id, $model->id);
				
				if($model->is_leaf)
				{
					$this->addLeafIds($parentChannel->parent_ids.$parentChannel->id, $model->id);				
				}
			}
			$this->createCache();
			
			return $this->redirect(['index']);
		} else {
			$channelTree=Channel::getChannelTree();
			
			
			$tableList=$this->getTableList();
			$tplChannelList=$this->getTplChannelList();
			$tplListList=$this->getTplListList();
			$tplViewList=$this->getTplViewList();
			
			return $this->render('create', [
				'model' => $model,
				'channelTree' => $channelTree,
				'tableList' => $tableList,
				'tplChannelList' => $tplChannelList,
				'tplListList'=>$tplListList,
				'tplViewList'=>$tplViewList,
			]);
		}
	}

	/**
	 * Updates an existing Channel model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionUpdate($id)
	{
		$model = $this->findModel($id);		
		
		if ($model->load($_POST)) {
			
			$newParentId=$model->parent_id;
			$oldParentId=$model->oldAttributes['parent_id'];
			if($newParentId!==$oldParentId)
			{
				$this->detachCategory($model);
			}
			
			$newParentModel=Channel::find($newParentId);		
			if($newParentModel==null)
			{
				$model->parent_ids='0,';
				$model->level=0;
			}
			else 
			{
				$model->parent_ids=$newParentModel->parent_ids.$newParentModel->id.',';
				$model->level=$newParentModel->level+1;
			}
			
			if($model->oldAttributes['table_id']!==$model->table_id)
			{
				$model->table_name=DefineTable::find($model->table_id)->name_en;
			}
			$model->table_name=DefineTable::find($model->table_id)->name_en;
			
			$model->save();
			
			if($newParentId!==$oldParentId)
			{
				$this->attachCategory($model);
			}			
			
			$this->createCache();
			
			return $this->redirect(['index']);
		} else {			
			$channelTree=Channel::getChannelTree();
			
			$tableList=$this->getTableList();
			$tplChannelList=$this->getTplChannelList();
			$tplListList=$this->getTplListList();
			$tplViewList=$this->getTplViewList();
			
			return $this->render('update', [
				'model' => $model,
				'channelTree' => $channelTree,
				'tableList' => $tableList,
				'tplChannelList' => $tplChannelList,
				'tplListList'=>$tplListList,
				'tplViewList'=>$tplViewList,
			]);
		}
	}

	public function detachCategory($model)
	{
		$id=$model->id;
		//$parent_id=$model->parent_id;
		$parent_id=$model->oldAttributes['parent_id'];
		$parent_ids=$model->parent_ids;
		$leaf_ids=rtrim($model->leaf_ids,',');
	
		
		$parent_ids2=rtrim($parent_ids,',');
	
		//�ȴӸ�����child_ids���Ƴ��Լ�
		$this->removeChildIds($parent_id, $id);
	
		//�����Ҷ�ӽ�㣬�����еĸ�����leaf_ids���Ƴ��Լ�
		if($model->is_leaf)
		{
			$this->removeLeafIds($parent_ids2, $id);
		}
		else
		{
			//����Լ���Ҷ�ӽ�㣬�����еĸ�����leaf_ids�Ƴ��Լ���Ҷ�ӽ��
			if($leaf_ids)
			{
				$leafIdsArray=explode(',', $leaf_ids);
				
				foreach ($leafIdsArray as $leafId)
				{
					//$this->info($parent_ids2,__METHOD__);
					$this->removeLeafIds($parent_ids2, $leafId);
				}
			}
		}
	}
	
	public function attachCategory($model)
	{
		$id=$model->id;
		$parent_id=$model->parent_id;
		$parent_ids=$model->parent_ids;
		$leaf_ids=$model->leaf_ids;
	
		$parent_ids2=rtrim($parent_ids,',');	
		
		//���Լ���ӵ��µĸ�����child_ids����
		$this->addChildIds($parent_id, $id);
		
		//�����Ҷ�ӽ�㣬���Լ���ӵ����и�����leaf_ids����
		if($model->is_leaf)
		{
			$this->addLeafIds($parent_ids2, $id);
		}
		else
		{
			//���Լ���Ҷ�ӽ����ӵ����и�����leaf_ids����
			if($leaf_ids)
			{
				$this->addLeafIds($parent_ids2, $leaf_ids,'');
	
				//�����Լ��������ӽ���parent_ids��level
				$this->updateChildParentIds($model);
			}
		}
	}
	
	//��$childId��ӵ�id����
	public function addChildIds($id,$childId)
	{
		$sql='update yii_channel set child_ids=concat(child_ids,\''.$childId.',\') where id='.$id;
		$this->execute($sql);
	}
	
	public function removeChildIds($id,$childId)
	{
		$sql='update yii_channel set child_ids=replace(child_ids,\''.$childId.',\',\'\')';
		$sql.=' where id='.$id;
		$this->execute($sql);
	}
	
	//��$leaveId��ӵ����е�ids����
	public function addLeafIds($ids,$leaveId,$lastDot=',')
	{				
		$sql='update yii_channel set leaf_ids=concat(leaf_ids,\''.$leaveId.$lastDot.'\')';
		$sql.=' where id in('.$ids.')';
		$this->execute($sql);				
	}
	
	public function removeLeafIds($ids,$leaveId)
	{
		$sql='update yii_channel set leaf_ids=replace(leaf_ids,\''.$leaveId.',\',\'\')';
		$sql.=' where id in('.$ids.')';
		$this->execute($sql);
	}
	
	public function updateChildParentIds($model)
	{
		//�������е��ӽ�㣬���û�з���
		$childChannelList=Channel::findAll(['parent_id'=>$model->id]);
		if($childChannelList==null)
		{
			return;
		}
	
		foreach ($childChannelList as $childChannel)
		{
			//�����ӽ���parent_ids��level
			$childChannel->parent_ids=$model->parent_ids.$model->id.',';
			$childChannel->level=$model->level+1;
			$childChannel->save();
			
			$this->updateChildParentIds($childChannel);
		}
	}
	
	public function getCacheItem($row,$name,$isInt=false)
	{
		$newLine="\r\n";
		
		$value='\''.$row[$name].'\'';
		
		if($isInt)
		{
			if(isset($row[$name]))
			{
				$value=$row[$name];
			}
			else 
			{
				$value=0;
			}
		}
		
		return '	\''.$name.'\' => '.$value.','.$newLine;
	}
	
	public function  getCacheValue($row,$name,$isInt=false)
	{
		if($isInt)
		{
			if(isset($row[$name]))
			{
				return $row[$name];
			}
			return 0;
		}
		return $row[$name];
	}
	
	public function createCache()
	{
		$newLine="\r\n";
		$content='<?php'.$newLine;
		$content.='$cachedChannel=[];'.$newLine;
		$dataList=Channel::findAll();
		foreach ($dataList as $row)
		{
// 			$content.='$cachedChannel['.$row['id']."]=[".$newLine;
// 			$content.="'id'=>".$row['id'].",".$newLine;
// 			$content.="'parent_id'=>".$row['parent_id'].",".$newLine;
// 			$content.="'parent_ids'=>'".$row['parent_ids']."',".$newLine;
// 			$content.="'child_ids'=>'".$row['child_ids']."',".$newLine;
// 			$content.="'leaf_ids'=>'".$row['leaf_ids']."',".$newLine;
// 			$content.="'name'=>'".$row['name']."',".$newLine;
// 			$content.="'name_alias'=>'".$row['name_alias']."',".$newLine;
// 			$content.="'name_url'=>'".$row['name_url']."',".$newLine;
// 			$content.="'redirect_url'=>'".$row['redirect_url']."',".$newLine;
// 			$content.="'level'=>".$row['level'].",".$newLine;
// 			$content.="'is_leaf'=>".$row['is_leaf'].",".$newLine;
// 			$content.="'is_nav'=>".$row['is_nav'].",".$newLine;
// 			$content.="'sort_num'=>".$row['sort_num'].",".$newLine;
// 			$content.="'table_id'=>".$row['table_id'].",".$newLine;
// 			$content.="'table_name'=>'".$row['table_name']."',".$newLine;
// 			$content.="'tpl_channel'=>".$row['tpl_channel'].",".$newLine;
// 			$content.="'tpl_list'=>".$row['tpl_list'].",".$newLine;
// 			$content.="'tpl_view'=>".$row['tpl_view'].",".$newLine;
// 			$content.="'page_size'=>".$row['page_size'].",".$newLine;
			
			$content.='$cachedChannel['.$row['id'].']=['.$newLine;
// 			$content.='\'id\'=>'.$row['id'].','.$newLine;
// 			$content.='\'parent_id\'=>'.$row['parent_id'].','.$newLine;
// 			$content.='\'parent_ids\'=>\''.$row['parent_ids'].'\','.$newLine;
// 			$content.='\'child_ids\'=>\''.$row['child_ids'].'\','.$newLine;
// 			$content.='\'leaf_ids\'=>\''.$row['leaf_ids'].'\','.$newLine;
// 			$content.='\'name\'=>\''.$row['name'].'\','.$newLine;
// 			$content.='\'name_alias\'=>\''.$row['name_alias'].'\','.$newLine;
// 			$content.='\'name_url\'=>\''.$row['name_url'].'\','.$newLine;
// 			$content.='\'redirect_url\'=>\''.$row['redirect_url'].'\','.$newLine;
// 			$content.='\'level\'=>'.$row['level'].','.$newLine;
// 			$content.='\'is_leaf\'=>'.$row['is_leaf'].','.$newLine;
// 			$content.='\'is_nav\'=>'.$row['is_nav'].','.$newLine;
// 			$content.='\'sort_num\'=>'.$row['sort_num'].','.$newLine;
// 			$content.='\'table_id\'=>'.$row['table_id'].','.$newLine;
// 			$content.='\'table_name\'=>\''.$row['table_name'].'\','.$newLine;
// 			$content.='\'tpl_channel\'=>'.$row['tpl_channel'].','.$newLine;
// 			$content.='\'tpl_list\'=>'.$row['tpl_list'].','.$newLine;
// 			$content.='\'tpl_view\'=>'.$row['tpl_view'].','.$newLine;
// 			$content.='\'page_size\'=>'.$this->getCacheValue($row,'page_size',true).','.$newLine;
			
			$content.=$this->getCacheItem($row, 'id',true);
			$content.=$this->getCacheItem($row, 'parent_id',true);
			$content.=$this->getCacheItem($row, 'parent_ids');
			$content.=$this->getCacheItem($row, 'child_ids');
			$content.=$this->getCacheItem($row, 'leaf_ids');
			$content.=$this->getCacheItem($row, 'name');
			$content.=$this->getCacheItem($row, 'name_alias');
			$content.=$this->getCacheItem($row, 'name_url');
			$content.=$this->getCacheItem($row, 'redirect_url');
			$content.=$this->getCacheItem($row, 'level',true);
			$content.=$this->getCacheItem($row, 'is_leaf',true);
			$content.=$this->getCacheItem($row, 'is_nav',true);
			$content.=$this->getCacheItem($row, 'sort_num',true);
			$content.=$this->getCacheItem($row, 'table_id',true);
			$content.=$this->getCacheItem($row, 'table_name');
			$content.=$this->getCacheItem($row, 'tpl_channel',true);
			$content.=$this->getCacheItem($row, 'tpl_list',true);
			$content.=$this->getCacheItem($row, 'tpl_view',true);
			$content.=$this->getCacheItem($row, 'page_size',true);
			
// 			$content.='cachedChannel['.$row['id'].']=[\n';
// 			$content.='\'id\'=>'.$row['id'].',';
// 			$content.='\'parent_id\'=>'.$row['parent_id'].',';
// 			$content.='\'parent_ids\'=>\''.$row['parent_ids'].'\',';
// 			$content.='\'child_ids\'=>\''.$row['child_ids'].'\',';
// 			$content.='\'leaf_ids\'=>\''.$row['leaf_ids'].'\',';
// 			$content.='\'name\'=>\''.$row['name'].'\',';
// 			$content.='\'name_alias\'=>\''.$row['name_alias'].'\',';
// 			$content.='\'name_url\'=>\''.$row['name_url'].'\',';
// 			$content.='\'redirect_url\'=>\''.$row['redirect_url'].'\',';
// 			$content.='\'level\'=>'.$row['level'].',';
// 			$content.='\'is_leaf\'=>'.$row['is_leaf'].',';
// 			$content.='\'is_nav\'=>'.$row['is_nav'].',';
// 			$content.='\'sort_num\'=>'.$row['sort_num'].',';
// 			$content.='\'table_id\'=>'.$row['table_id'].',';
// 			$content.='\'table_name\'=>\''.$row['table_name'].'\',';
// 			$content.='\'tpl_channel\'=>'.$row['tpl_channel'].',';
// 			$content.='\'tpl_list\'=>'.$row['tpl_list'].',';
// 			$content.='\'tpl_view\'=>'.$row['tpl_view'].',';
// 			$content.='\'page_size\'=>'.$row['page_size'].',';
			
			$content.="];".$newLine;
		}
		
		
		$rootData = \Yii::getAlias('@data');
		
		$filePath=$rootData.'/cache/cachedChannel.php';
		
		TFileHelper::writeFile($filePath, $content);
			
		//$this->info($cachedContent,__METHOD__);
		
		return $content;
	}
	
	/**
	 * Deletes an existing Channel model.
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
	 * Finds the Channel model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $id
	 * @return Channel the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id)
	{
		if (($model = Channel::find($id)) !== null) {
			return $model;
		} else {
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}
}

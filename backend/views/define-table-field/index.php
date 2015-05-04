<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\includes\CommonUtility;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\models\search\DefineTableFieldSearch $searchModel
 */

$this->title = '字段管理';
$this->addBreadcrumb('内容模型('.$table.')',['define-table/index']);
$this->addBreadcrumb($this->title);

// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="define-table-field-index">

	<p>
		<?= Html::a('新建', ['create','tb'=>$table], ['class' => 'btn btn-success']) ?>
	</p>


	<table class="table">
	    <tr class="tb_header">
	      <th width="20"> ID</th>
	      <th>名称</th>
	      <th width="150">字段</th>
	      <th width="150">类型</th>
	      
	      <th width="55">可空</th>
	      <th width="55">主表</th>
	      <th width="80">操作</th>
	    </tr>
		<?php foreach ($rows as $row ): ?>
		<tr>
		<td><?php echo $row['id']?></td>
		<td><?php echo $row['name']?></td>
		<td><?php echo $row['field_name']?></td>
		<td><?php echo $row['fieldtype']?></td>
		<td><?php echo CommonUtility::getYesNo($row['is_null'])?></td>
		<td><?php echo CommonUtility::getYesNo($row['is_main'])?></td>
		<td>
		<?= Html::a('编辑', ['update', 'tb' => $row->table,'id'=>$row->id]) ?>
		<?php 
			if(!$row['is_sys'])
			{
				echo Html::a('删除', ['delete', 'tb' => $row->table,'id'=>$row->id], [
							'data-confirm' => Yii::t('app', 'Are you sure to delete this item?'),
							'data-method' => 'post',
						]);
			}
		?>
	
		</td>
		</tr>
		<?php endforeach;?>
	</table>

	

</div>

<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var common\models\search\DictSearch $searchModel
 */

$this->title = '数据字典';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dict-index">

   
    <p>
        <?= Html::a('新建', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
	<table width="100%" class="table">
	    <tr class="tb_header">
	      <th width="80px">ID</th>
	      <th width="80px">父编号</th>
	      <th width="80px">分类</th>
	      <th >名称</th>
	      <th width="80px">值</th>
	      <th width="80px">数据类型</th>
	      <th width="80px">排序</th>
	      <th width="150">操作</th>
	    </tr>
		<?php foreach ($rows as $row ): ?>
		<tr>
		<td><?php echo $row['id']?></td>
		<td><?php echo $row['parent_id']?></td>
		<td><?php echo $row['category_key']?></td>
		<td><?php echo $row['name']?></td>
		<td><?php echo $row['value']?></td>
		<td><?php echo $row['datatype']?></td>
		<td><?php echo $row['sort_num']?></td>
		<td>
			<?= Html::a('编辑', ['update', 'id' => $row->key]) ?>
			<?php echo Html::a('删除', ['delete', 'id' => $row->key], [
				'data-confirm' => Yii::t('app', 'Are you sure to delete this item?'),
				'data-method' => 'post',
			]); ?>
		</td>
		</tr>
		<?php endforeach;?>
	</table>
	
</div>

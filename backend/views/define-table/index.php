<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\models\search\DefineTableSearch $searchModel
 */

$this->title = '内容模型';
$this->addBreadcrumb($this->title);

?>
<div class="define-table-index">

	<p>
		<?= Html::a('新建模型', ['create'], ['class' => 'btn btn-success']) ?>
	</p>

	<table width="100%" class="table">
	    <tr class="tb_header">
	      <th>名称</th>
	      <th width="150px">表名</th>
	      <th width="80px">默认表</th>
	      <th width="160px">操作</th>
	    </tr>
		<?php foreach ($rows as $row ): ?>
		<tr>
			<td><?php echo $row['name']?></td>
			<td><?php echo $row['table_name']?></td>
			<td><?php echo $row['is_default']?></td>
			<td>
				<?= Html::a('编辑', ['update', 'tb' => $row->table_name]) ?>
				<?= Html::a('Action', ['action', 'tb' => $row->table_name]) ?>
				<?= Html::a('字段', ['define-table-field/index', 'tb' => $row->table_name]) ?>		
				<?php echo Html::a('删除', ['delete', 'tb' => $row->table_name], [
					'data-confirm' => Yii::t('app', 'Are you sure to delete this item?'),
					'data-method' => 'post',
				]); ?>
			</td>
		</tr>
		<?php endforeach;?>
	</table>
</div>

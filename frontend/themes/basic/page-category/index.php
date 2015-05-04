<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var common\models\search\PageCategorySearch $searchModel
 */

$this->title = '页面分类';
$this->addBreadcrumb($this->title);
?>
<div class="page-category-index">

    <p>
        <?= Html::a('新建分类', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
	<table class="table">
	    <tr class="tb_header">
	      <th >名称</th>
	      <th >描述</th>
	      <th width="80px">排序</th>
	      <th width="150">操作</th>
	    </tr>
		<?php foreach ($rows as $row ): ?>
		<tr>
		<td><?php echo $row['name']?></td>
		<td><?php echo $row['description']?></td>
		<td><?php echo $row['sort_num']?></td>
		<td>
			<?= Html::a('添加页面', ['page/create', 'catid' => $row->id]) ?>
			<?= Html::a('编辑', ['update', 'id' => $row->id]) ?>
			<?php echo Html::a('删除', ['delete', 'id' => $row->id], [
				'data-confirm' => Yii::t('app', 'Are you sure to delete this item?'),
				'data-method' => 'post',
			]); ?>
		</td>
		</tr>
		<?php endforeach;?>
	</table>
</div>

<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var common\models\search\DictCategorySearch $searchModel
 */

$this->title = '字典分类';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dict-category-index">

    <p>
        <?= Html::a('新建', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
	<table width="100%" class="table">
	    <tr class="tb_header">
	      <th width="180px">Key</th>
	      <th >名称</th>
	      <th >描述</th>
	      <th width="80px">是否系统</th>
	      <th width="150">操作</th>
	    </tr>
		<?php foreach ($rows as $row ): ?>
		<tr>
		<td><?php echo $row['key']?></td>
		<td><?php echo $row['name']?></td>
		<td><?php echo $row['description']?></td>
		<td><?php echo $row['is_sys']?></td>
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

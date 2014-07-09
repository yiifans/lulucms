<?php

use yii\helpers\Html;
use yii\grid\GridView;
use components\helpers\TTimeHelper;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var common\models\search\PageSearch $searchModel
 */

$this->title = '页面管理';
$this->addBreadcrumb($this->title);
?>
<div class="page-index">

    <p>
        <?= Html::a('新建页面', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
	<table class="table">
	    <tr class="tb_header">
	      <th >标题</th>
	      <th width="120px">发布时间</th>
	      <th width="80px">排序</th>
	      <th width="150">操作</th>
	    </tr>
		<?php foreach ($rows as $row ): ?>
		<tr>
		<td><?php echo $row['title']?></td>
		<td><?php echo TTimeHelper::showTime($row['publish_time']) ?></td>
		<td><?php echo $row['sort_num']?></td>
		<td>
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

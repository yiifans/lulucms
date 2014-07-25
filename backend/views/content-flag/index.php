<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\LinkPager;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var common\models\search\ContentFlagSearch $searchModel
 */

$this->title = '聚合标签';
$this->addBreadcrumb($this->title);

?>
<div class="content-flag-index">
    <p>
        <?= Html::a('新建标签', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
	<table class="table">
	    <tr class="tb_header">
	      <th width="80px">ID</th>
	      <th>名称</th>
	      <th width="120px">值</th>
	      <th width="150">操作</th>
	    </tr>
		<?php foreach ($rows as $row ): ?>
		<tr>
		<td><?php echo $row['id']?></td>
		<td><?php echo $row['name']?></td>
		<td><?php echo $row['value']?></td>
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
    <div class="tbox">
	    <div class="floatRight">
		    <?php echo LinkPager::widget([
		   		'pagination' => $pages,
		   	]);?>
	    </div>
    </div> 	
</div>

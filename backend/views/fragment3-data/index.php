<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\includes\CommonUtility;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var common\models\search\Fragment3DataSearch $searchModel
 */

$this->title =$currentFragment->name;
$this->addBreadcrumb(CommonUtility::getFragmentType(3).'管理',['fragment/index','type'=>3]);
$this->addBreadcrumb($this->title);
?>
<div class="fragment3-data-index">
    <p>
        <?= Html::a('新建内容', ['create','fraid'=>$currentFragment->id], ['class' => 'btn btn-success']) ?>
    </p>
	<table class="table">
	    <tr class="tb_header">
	      <th width="50">ID</th>
	      <th >频道ID</th>
	      <th >标题</th>
	      <th width="80px">排序</th>
	      <th width="150">操作</th>
	    </tr>
		<?php foreach ($rows as $row ): ?>
		<tr>
		<td><?php echo $row['id']?></td>
		<td><?php echo $row['channel_id']?></td>
		<td><?php echo $row['title']?></td>
		<td>
			<?= Html::a('编辑', ['update', 'id' => $row['id'],'fraid'=>$currentFragment->id]) ?>
			<?php echo Html::a('删除', ['delete', 'id' => $row['id'],'fraid'=>$currentFragment->id], [
				'data-confirm' => Yii::t('app', 'Are you sure to delete this item?'),
				'data-method' => 'post',
			]); ?>
		</td>
		</tr>
		<?php endforeach;?>
	</table>

</div>

<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\includes\CommonUtility;
use yii\widgets\LinkPager;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var common\models\search\FragmentSearch $searchModel
 */

$this->title =CommonUtility::getFragmentType($type).'管理';
$this->addBreadcrumb($this->title);
?>
<div class="fragment-index">

    <p>
        <?= Html::a('新建碎片', ['create','type'=>$type], ['class' => 'btn btn-success']) ?>
        <?= Html::a('碎片分类', ['fragment-category/index','type'=>$type], ['class' => 'btn btn-success']) ?>
    </p>
	<table class="table">
	    <tr class="tb_header">
	      <th width="50">ID</th>
	      <th >碎片名称</th>
	      <th width="120px">分类</th>
	      <th width="80px">排序</th>
	      <th width="150px">操作</th>
	    </tr>
		<?php foreach ($rows as $row ): ?>
		<tr>
		<td><?php echo $row['id']?></td>
		<td><?php echo $row['name']?></td>
		<td><?php echo $row['category_id']?></td>
		<td><?php echo $row['sort_num']?></td>
		<td>
			<?= Html::a('内容', ['fragment'.$row['type'].'-data/index', 'fraid' => $row->id]) ?>
			<?= Html::a('编辑', ['update', 'id' => $row->id,'type'=>$type]) ?>
			<?php echo Html::a('删除', ['delete', 'id' => $row->id,'type'=>$type], [
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

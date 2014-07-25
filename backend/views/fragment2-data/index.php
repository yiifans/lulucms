<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\includes\CommonUtility;
use yii\widgets\LinkPager;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var common\models\search\Fragment2DataSearch $searchModel
 */

$this->title =$currentFragment->name;
$this->addBreadcrumb(CommonUtility::getFragmentType(2).'管理',['fragment/index','type'=>2]);
$this->addBreadcrumb($this->title);
?>
<div class="fragment2-data-index">
    <p>
        <?= Html::a('新建内容', ['create','fraid'=>$currentFragment->id], ['class' => 'btn btn-success']) ?>
    </p>
	<table class="table">
	    <tr class="tb_header">
	      <th width="50">ID</th>
	      <th >标题</th>
	      <th width="80px">排序</th>
	      <th width="150">操作</th>
	    </tr>
		<?php foreach ($rows as $row ): ?>
		<tr>
		<td><?php echo $row['id']?></td>
		<td><?php echo $row['title']?></td>
		<td><?php echo $row['sort_num']?></td>
		<td>
			<?= Html::a('编辑', ['update', 'id' => $row->id,'fraid'=>$row->fragment_id]) ?>
			<?php echo Html::a('删除', ['delete', 'id' => $row->id,'fraid'=>$row->fragment_id], [
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

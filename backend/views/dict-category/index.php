<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\LinkPager;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var common\models\search\DictCategorySearch $searchModel
 */

$this->title = '字典分类';
$this->addBreadcrumb($this->title);
?>
<div class="dict-category-index">

    <p>
        <?= Html::a('新建分类', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
	<table width="100%" class="table">
	    <tr class="tb_header">
	      
	      <th >分类名称</th>
	      <th width="180px">缓存Key</th>
	      <th width="80px">是否系统</th>
	      <th width="200">操作</th>
	    </tr>
		<?php foreach ($rows as $row ): ?>
		<tr>
		
		<td><?php echo $row['name']?></td>
		<td><?php echo $row['id']?></td>
		<td><?php echo $row['is_sys']?></td>
		<td>
			<?= Html::a('查看数据', ['dict/index', 'catid' => $row->id]) ?>
			<?= Html::a('添加数据', ['dict/create', 'catid' => $row->id]) ?>
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

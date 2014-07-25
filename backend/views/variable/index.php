<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\LinkPager;
use common\includes\CommonUtility;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var common\models\search\Variable $searchModel
 */

$this->title = '自定义变量';
$this->addBreadCrumb($this->title);

?>
<div class="variable-index">
    <p>
        <?= Html::a('新建变量', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
	<table width="100%" class="table">
	    <tr class="tb_header">
	      <th width="80px">变量名</th>
	      <th width="120px">名称</th>
	      <th >值</th>
	      <th width="80px">数据类型</th>
	      <th width="150">操作</th>
	    </tr>
		<?php foreach ($rows as $row ): ?>
		<tr>
		<td><?php echo $row['id']?></td>
		<td><?php echo $row['name']?></td>
		<td><?php echo $row['value']?></td>
		<td><?php echo CommonUtility::getDataType($row['data_type'])?></td>
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

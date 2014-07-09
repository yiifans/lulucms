<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var common\models\search\ConfigSearch $searchModel
 */

$this->title = '系统设置';
$this->addBreadcrumb($this->title);
?>
<div class="config-index">

    <p>
        <?= Html::a('Create Config', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
	<table width="100%" class="table">
	    <tr class="tb_header">
	      <th width="150px">Scope</th>
	      <th width="150px">变量名</th>
	      <th width="300px">名称</th>
	      <th >值</th>
	      <th width="80px">数据类型</th>
	      <th width="150">操作</th>
	    </tr>
		<?php foreach ($rows as $row ): ?>
		<tr>
		<td><?php echo $row['scope']?></td>
		<td><?php echo $row['variable']?></td>
		<td><?php echo $row['name']?></td>
		<td><?php echo $row['value']?></td>
		<td><?php echo $row['description']?></td>
		<td>
			<?= Html::a('编辑', ['update', 'id' => $row->variable]) ?>
			<?php echo Html::a('删除', ['delete', 'id' => $row->variable], [
				'data-confirm' => Yii::t('app', 'Are you sure to delete this item?'),
				'data-method' => 'post',
			]); ?>
		</td>
		</tr>
		<?php endforeach;?>
	</table>
	
</div>

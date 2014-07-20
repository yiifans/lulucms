<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\models\search\CatalogSearch $searchModel
 */

$this->title = '频道管理';
$this->addBreadcrumb($this->title);
?>
<div class="catalog-index">

	<p>
		<?= Html::a('新建频道', ['create'], ['class' => 'btn btn-success']) ?>
	</p>
<table class="table">
    <tr class="tb_header">
      <th width="60px"> 编号</th>
      <th>名称</th>
      <th width="80px"> 存储表</th>
      <th width="10%">template</th>
      <th width="150">操作</th>
    </tr>
	<?php foreach ($this->channels as $row ): ?>
	<tr>
	<td><?php echo $row['id']?></td>
	<td><?php for($i=0;$i<$row['level'];$i++)
	{
		echo '&nbsp;&nbsp;&nbsp;&nbsp;';
	}
	?>
	<a href="index.php?r=content/index&catid=<?php echo $row['id']?>" target="_blank">
	<?php 
		if($row['is_leaf'])
		{
			echo '<font color="red">'.$row['name'].'</font>';
		}
		else
		{
			echo $row['name'];
		}
	
	?></a> 
	</td>
	<td><?php echo $row['table']?></td>
	<td><?php if($row['is_leaf']){echo $row['list_tpl'];}else{echo $row['channel_tpl'];}?></td>
	<td align="right">
		
		<?php
			if($row['is_leaf'])
			{
				echo Html::a('添加内容', ['content/create', 'chnid' => $row['id']]);
			}	
		 ?>
		
		<?= Html::a('编辑', ['update', 'id' => $row['id']]) ?>
		
		<?php echo Html::a('删除', ['delete', 'id' => $row['id']], [
			'data-confirm' => Yii::t('app', 'Are you sure to delete this item?'),
			'data-method' => 'post',
		]); ?>
		
	</td>
	</tr>
	<?php endforeach;?>
</table>

	

</div>

<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\models\search\CatalogSearch $searchModel
 */

$this->title = '频道管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="catalog-index">

	<h1><?= Html::encode($this->title) ?></h1>

	<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

	<p>
		<?= Html::a('创建频道', ['create'], ['class' => 'btn btn-success']) ?>
	</p>
<table class="table">
    <tr class="tb_header">
      <th width="60px"> 编号</th>
      <th width="80px">父编号</th>
      <th width="60px"> 级别</th>
      <th>名称</th>
      <th width="80px"> 存储表</th>
      <th width="10%">template</th>
      <th width="120">do</th>
    </tr>
	<?php foreach ($channelArrayTree as $row ): ?>
	<tr>
	<td><?php echo $row['id']?></td>
	<td><?php echo $row['parent_id']?></td>
	
	<td><?php echo $row['level']?></td>
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
	<td>
		
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

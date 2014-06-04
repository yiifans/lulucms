<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\models\search\CatalogSearch $searchModel
 */

$this->title = 'Catalogs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="catalog-index">

	<h1><?= Html::encode($this->title) ?></h1>

	<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

	<p>
		<?= Html::a('Create Catalog', ['create'], ['class' => 'btn btn-success']) ?>
	</p>
<table width="100%" class="table">
    <tr class="tb_header">
      <th width="40px"> ID</th>
      
      <th width="80px"> Table Name</th>
      <th width="40px"> level</th>
      <th>name cn</th>
      <th width="60px">parent id</th>
      <th width="15%">parent ids</th>
      <th width="15%">child ids</th>
      <th width="15%">leaf ids</th>
      <th width="10%">list template</th>
      <th width="120">do</th>
    </tr>
	<?php foreach ($dataList as $row ): ?>
	<tr>
	<td><?php echo $row['id']?></td>
	
	<td><?php echo $row['table_name']?>(<?php echo $row['table_id']?>)</td>
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
	<td><?php echo $row['parent_id']?></td>
	<td><?php echo $row['parent_ids']?></td>
	<td><?php echo $row['child_ids']?></td>
	<td><?php echo $row['leaf_ids']?></td>
	<td><?php echo $row['tpl_list']?></td>
	<td>
		<a href="index.php?r=channel/view&id=<?php echo $row['id']?>"><span class="glyphicon glyphicon-eye-open"></span></a>
		<a href="index.php?r=channel/update&id=<?php echo $row['id']?>"><span class="glyphicon glyphicon-pencil"></span></a>
		<a href="index.php?r=channel/delete&id=<?php echo $row['id']?>" data-confirm="Are you sure to delete this item?" data-method="post"><span class="glyphicon glyphicon-trash"></span></a>
	</td>
	</tr>
	<?php endforeach;?>
</table>

	

</div>

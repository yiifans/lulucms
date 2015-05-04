<?php

use yii\helpers\Html;
use yii\grid\GridView;
use ts\widgets\TLoop;
use yii\helpers\VarDumper;

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
	
	<?php 
	$blanks='';
	for($i=0;$i<5;$i++)
	{
	$blanks.='&nbsp;&nbsp;&nbsp;&nbsp;';
	}
	
	$itemTpl='
	<tr>
	<td>18</td>
	<td>9</td>
	<td>1</td>
	<td>'.$blanks.'<a href="index.php?r=content/index&catid=18" target="_blank">服装</a></td>
	<td>1</td>
	<td>2</td>
	<td>
		<a href="index.php?r=content/create&catid=18">Add Content</a>|
		<a href="index.php?r=catalog/update&id=18">Edit</a>|
		<a href="index.php?r=catalog/delete&id=18">Delete</a>
	</td>
	</tr>';
	
	
	?>
	
<table width="100%" class="table">
    <tr class="tb_header">
      <th width="40px"> ID</th>
      <th width="80px"> Model ID</th>
      <th width="40px"> sort</th>
      <th>name cn</th>
      <th width="80px">parent id</th>
      <th width="10%">list template</th>
      <th width="200">do</th>
    </tr>
    
  --------------
    <?php TLoop::begin([
		'dataSource'=>$dataList,
		'isCode' => True,
	]);?>
	
	$blanks='';
	for($i=0;$i<$row['level'];$i++)
	{
		$blanks.='&nbsp;&nbsp;&nbsp;&nbsp;';
	}
	
	$itemTpl='
	<tr>
	<td>{id}</td>
	<td>{model_id}</td>
	<td>{sort_num}</td>
	<td>'.$blanks.'<a href="index.php?r=content/index&catid={id}" target="_blank">{name_zh}</a></td>
	<td>{parent_id}</td>
	<td>{tpl_list}</td>
	<td>
		<a href="index.php?r=content/create&catid={id}">Add Content</a>|
		<a href="index.php?r=catalog/update&id={id}">Edit</a>|
		<a href="index.php?r=catalog/delete&id={id}">Delete</a>
	</td>
	</tr>';
	
	<?php TLoop::end();?>
	--------------
	
	<?php foreach ($dataList as $row ): ?>
	<tr>
	<td>aaaaaaaa<?php echo $row['id']?></td>
	<td><?php echo $row['model_id']?></td>
	<td><?php echo $row['sort_num']?></td>
	<td><?php for($i=0;$i<$row['level'];$i++)
	{
		echo '&nbsp;&nbsp;&nbsp;&nbsp;';
	}
	?>
	<a href="index.php?r=content/index&catid=<?php echo $row['id']?>" target="_blank"><?php echo $row['name_zh']?></a> 
	</td>
	<td><?php echo $row['parent_id']?></td>
	<td><?php echo $row['tpl_list']?></td>
	<td>
		<a href="index.php?r=content/create&catid=<?php echo $row['id']?>">Add Content</a>|
		<a href="index.php?r=catalog/update&id=<?php echo $row['id']?>">Edit</a>|
		<a href="index.php?r=catalog/delete&id=<?php echo $row['id']?>">Delete</a>
		
	</td>
	</tr>
	<?php endforeach;?>
</table>

	<?php echo GridView::widget([
		'dataProvider' => $dataProvider,
		'filterModel' => $searchModel,
		'columns' => [
			['class' => 'yii\grid\SerialColumn'],

			'id',
			'parent_id',
			'name_en',
			'name_zh',
			'redirect_url:url',
			// 'is_end:boolean',
			// 'is_nav:boolean',
			// 'sort_num',
			// 'model_id',
			// 'tpl_page',
			// 'tpl_list',
			// 'tpl_content',
			// 'page_size',
			// 'note',
			// 'note2',

			['class' => 'yii\grid\ActionColumn'],
		],
	]); ?>



</div>

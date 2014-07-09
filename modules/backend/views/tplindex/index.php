<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\VarDumper;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var common\models\search\TplIndexSearch $searchModel
 */
//$this->layout='tpl';



$this->title = 'Tpl Indices';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tpl-index-index">

	<h1><?= Html::encode($this->title) ?></h1>

	<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

	<p>
		<?= Html::a('Create TplIndex', ['create'], ['class' => 'btn btn-success']) ?>
	</p>

	<table width="100%" class="table">
    <tr class="tb_header">
      <th width="40px"> ID</th>
      <th > Name</th>
      <th width="80px">File Path</th>
      <th width="160px">File Name</th>
      <th width="100px">Is Enable</th>
      <th width="120">do</th>
    </tr>
	<?php foreach ($dataList as $row ): ?>
	<tr>
	<td><?php echo $row['id']?></td>
	<td><?php echo $row['name']?></td>
	<td><?php echo $row['file_path']?></td>
	<td><?php echo $row['file_name']?></td>
	<td><?php echo $row['is_enable']?></td>
	<td>
		<a href="index.php?r=tplindex/view&id=<?php echo $row['id']?>"><span class="glyphicon glyphicon-eye-open"></span></a>
		<a href="index.php?r=tplindex/update&id=<?php echo $row['id']?>"><span class="glyphicon glyphicon-pencil"></span></a>
		<a href="index.php?r=tplindex/delete&id=<?php echo $row['id']?>" data-confirm="Are you sure to delete this item?" data-method="post"><span class="glyphicon glyphicon-trash"></span></a>
	</td>
	</tr>
	<?php endforeach;?>
</table>


</div>

<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var common\models\search\TplConverSearch $searchModel
 */

$this->title = 'Tpl Channel';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tpl-cover-index">

	<h1><?= Html::encode($this->title) ?></h1>

	<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

	<p>
		<?= Html::a('Create Tpl Channel', ['create'], ['class' => 'btn btn-success']) ?>
	</p>
	
	<table width="100%" class="table">
    <tr class="tb_header">
      <th width="40px"> ID</th>
      <th width="160px"> Table Name</th>
      <th > Name</th>
      <th width="80px">File Path</th>
      <th width="160px">File Name</th>
      <th width="120">do</th>
    </tr>
	<?php foreach ($dataList as $row ): ?>
	<tr>
	<td><?php echo $row['id']?></td>
	<td><?php echo $row['table_name']?></td>
	<td><?php echo $row['name']?></td>
	<td><?php echo $row['file_path']?></td>
	<td><?php echo $row['file_name']?></td>
	<td>
		<a href="index.php?r=tplchannel/view&id=<?php echo $row['id']?>"><span class="glyphicon glyphicon-eye-open"></span></a>
		<a href="index.php?r=tplchannel/update&id=<?php echo $row['id']?>"><span class="glyphicon glyphicon-pencil"></span></a>
		<a href="index.php?r=tplchannel/delete&id=<?php echo $row['id']?>" data-confirm="Are you sure to delete this item?" data-method="post"><span class="glyphicon glyphicon-trash"></span></a>
	</td>
	</tr>
	<?php endforeach;?>
</table>
	
	

</div>

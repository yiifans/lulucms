<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\models\search\DefineTableFieldSearch $searchModel
 */

$this->title = 'Table Fields';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="define-table-field-index">

	<h1><?= Html::encode($this->title) ?></h1>

	<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

	<p>
	<a href="index.php?r=definetablefield/create&tbid=<?php echo $tbid?>" class="btn btn-success">Create Table Field</a>
		
	</p>

	<table width="100%" class="table">
	    <tr class="tb_header">
	      <th width="10%"> ID</th>
	      <th>label</th>
	      <th width="20%">name</th>
	      <th width="10%">DB Type</th>
	      <th width="10%">Length</th>
	      <th width="10%">do</th>
	    </tr>
		<?php foreach ($dataList as $row ): ?>
		<tr>
		<td><?php echo $row['id']?></td>
		<td><?php echo $row['label']?></td>
		<td><?php echo $row['name']?></td>
		<td><?php echo $row['type']?></td>
		<td><?php echo $row['length']?></td>
		<td>
		<a href="index.php?r=definetablefield/update&id=<?php echo $row['id']?>&tbid=<?php echo $row['table_id']?>">Edit</a>|
		<a href="index.php?r=definetablefield/delete&id=<?php echo $row['id']?>&tbid=<?php echo $row['table_id']?>">Delete</a>|
		</td>
		</tr>
		<?php endforeach;?>
	</table>

	

</div>

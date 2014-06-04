<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\models\search\DefineModelSearch $searchModel
 */

$this->title = 'Define Models';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="define-model-index">

	<h1><?= Html::encode($this->title) ?></h1>

	<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

	<p>
	<a href="index.php?r=definemodel/create&tbid=<?php echo $tbid?>" class="btn btn-success">Create DefineModel</a>
		
	</p>

	<table width="100%" class="table">
	    <tr class="tb_header">
	      <th width="10%"> ID</th>
	      <th>Table Name</th>
	      <th>Name</th>
	      <th width="20%">do</th>
	    </tr>
		<?php foreach ($dataList as $row ): ?>
		<tr>
		<td><?php echo $row['id']?></td>
		<td><?php echo $row['table_name']?></td>
		<td><?php echo $row['name']?></td>
		<td><?php echo $row['alias']?></td>
		<td>
		<a href="index.php?r=definemodel/update&id=<?php echo $row['id']?>&tbid=<?php echo $row['table_id']?>">Edit Model</a>|
		<a href="index.php?r=definetablefield/index&tbid=<?php echo $row['id']?>">Edit Field</a>|
		
		</td>
		</tr>
		<?php endforeach;?>
	</table>
	
	

</div>

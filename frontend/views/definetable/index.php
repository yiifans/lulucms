<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\models\search\DefineTableSearch $searchModel
 */

$this->title = 'Tables';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="define-table-index">

	<h1><?= Html::encode($this->title) ?></h1>

	<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

	<p>
		<?= Html::a('Create Table', ['create'], ['class' => 'btn btn-success']) ?>
	</p>

	<table width="100%" class="table">
	    <tr class="tb_header">
	      <th width="10%"> ID</th>
	      <th>Name</th>
	      <th width="20%">do</th>
	    </tr>
		<?php foreach ($dataList as $row ): ?>
		<tr>
		<td><?php echo $row['id']?></td>
		<td><?php echo $row['label']?>(<?php echo $row['name']?>)</td>
		
		<td>
		<a href="index.php?r=definetablefield/index&tbid=<?php echo $row['id']?>" target="_blank">Edit Field</a>|
		<a href="index.php?r=definemodel/index&tbid=<?php echo $row['id']?>" target="_blank">Edit Model</a>|
		
		
		</td>
		</tr>
		<?php endforeach;?>
	</table>
	
	

</div>

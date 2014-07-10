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

	

<table width="100%">
    <tr class="tb_header">
      <th width="10%"> ID</th>
      <th width="10%"> sort</th>
      <th>name cn</th>
      <th width="10%">parent id</th>
      <th width="10%">level测试</th>
    </tr>
<?php foreach ($dataList as $row ): ?>
<tr>
<td><?php echo $row['id']?></td>
<td><?php echo $row['title']?></td>
<td><?php echo ''?></td>
<td><?php echo ''?></td>
<td><?php echo ''?></td>
</tr>
<?php endforeach;?>
</table>
</div>

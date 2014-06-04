<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\models\search\CatalogSearch $searchModel
 */

$this->title = 'Contents';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="catalog-index">

	<p>
		<?= Html::encode($this->title) ?>
		<a href="index.php?r=content/create&catid=<?php echo $catid ?>" class="btn btn-success" >Create Content</a>		
	</p>
	

<table width="100%" class="table">
    <tr class="tb_header">
      <th width="10%"> ID</th>
      <th width="10%"> Catalog ID</th>
      <th width="10%"> sort</th>
      <th>name cn</th>
      <th width="10%">parent id</th>
      <th width="10%">level测试</th>
    </tr>
<?php foreach ($dataList as $row ): ?>
<tr>
<td><?php echo $row['id']?></td>
<td><?php echo $row['catalog_id']?></td>
<td><?php echo $row['title']?></td>
<td><?php echo ''?></td>
<td><?php echo ''?></td>
<td><?php echo ''?></td>
</tr>
<?php endforeach;?>
</table>

</div>

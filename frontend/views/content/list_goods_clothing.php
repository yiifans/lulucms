<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\models\search\CatalogSearch $searchModel
 */

$this->title = $currentCatalog->name_zh;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="catalog-index">

<
<table width="100%" class="table">
    <tr class="tb_header">
      <th width="40px"> ID</th>
      <th width="40px"> sort</th>
      <th>title</th>
      <th width="10%">do</th>
    </tr>
	<?php foreach ($dataList as $row ): ?>
	<tr>
	<td><?php echo $row['id']?></td>
	<td><?php echo $row['catalog_id']?></td>
	<td><a href="index.php?r=content/view&id=<?php echo $row['id']?>" target="_blank"><?php echo $row['title']?></a></td>
	<td><?php echo ''?></td>
	</tr>
	<?php endforeach;?>
</table>

</div>

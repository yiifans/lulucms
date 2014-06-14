<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\models\search\CatalogSearch $searchModel
 */

$this->title = $currentChannel->name;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="catalog-index">

<table width="100%" class="table">
	<?php foreach ($dataList as $row ): ?>
	<tr>
	<td><a href="index.php?r=content/view&id=<?php echo $row['id']?>&chnid=<?php echo $row['channel_id']?>" target="_blank"><?php echo $row['title']?></a></td>
	<td width="180px"><?php echo $row['publish_time']?></td>
	</tr>
	<?php endforeach;?>
</table>

</div>

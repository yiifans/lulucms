<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\models\search\CatalogSearch $searchModel
 */

$this->title = $currentChannel['name'];

$this->buildBreadcrumbs($currentChannel['parent_id']);
$this->addBreadcrumb($currentChannel['name']);

?>
<div class="content-list">

<table width="100%" class="table">
	<?php foreach ($dataList as $row ): ?>
	<tr>
	<td>
		<?= Html::a($row['title'], ['detail','chnid'=>$row['channel_id'],'id'=>$row['id']]) ?>
	</td>
	<td width="180px"><?php echo $row['publish_time']?></td>
	</tr>
	<?php endforeach;?>
</table>

</div>

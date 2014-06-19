<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\models\search\CatalogSearch $searchModel
 */

$this->title = '内容管理：'.$currentChannel->name;
$this->addBreadcrumb($this->title);


?>
<div class="catalog-index">

	<?= Html::a('新建内容', ['create', 'chnid' => $chnid], ['class' => 'btn btn-primary']) ?>

<table class="table">
    <tr class="tb_header">
      <th width="40px"> ID</th>
      <th>title</th>
      <th width="10%">do</th>
    </tr>
	<?php foreach ($rows as $row ): ?>
	<tr>
	<td><?php echo $row['id']?></td>
	<td><?php echo $row['title']?></td>
	<td><?= Html::a('编辑', ['update', 'chnid' => $row['channel_id'],'id'=>$row['id']]) ?></td>
	</tr>
	<?php endforeach;?>
</table>

</div>

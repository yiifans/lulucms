<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\LinkPager;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\models\search\CatalogSearch $searchModel
 */

$this->title = '内容管理('.$currentChannel->name.':'.$currentChannel->id.')';
$this->addBreadcrumb($this->title);

?>
<div class="content-index">

	<p>
	<?= Html::a('新建内容', ['create', 'chnid' => $chnid], ['class' => 'btn btn-success']) ?>
	</p>

<table class="table">
    <tr class="tb_header">
      <th width="60px">编号</th>
      <th>标题</th>
      <th width="150px">操作</th>
    </tr>
	<?php foreach ($rows as $row ): ?>
	<tr>
	<td><?php echo $row['id']?></td>
	<td><?php echo $row['title']?></td>
	<td><?= Html::a('编辑', ['update', 'chnid' => $row['channel_id'],'id'=>$row['id']]) ?></td>
	</tr>
	<?php endforeach;?>
</table>
    <div class="tbox">
	    <div class="floatRight">
		    <?php echo LinkPager::widget([
		   		'pagination' => $pages,
		   	]);?>
	    </div>
    </div>  
</div>

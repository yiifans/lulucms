<?php

use yii\helpers\Html;
use yii\grid\GridView;
use components\LuLu;
use yii\widgets\LinkPager;
use components\helpers\TTimeHelper;
use components\widgets\LoopData;
use common\includes\DataSource;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var common\models\search\PageSearch $searchModel
 */

$this->title = '页面';
$this->addBreadcrumb($this->title);
?>

<div class="container">
	<div class="columnMain">
		<div class="tbox border page-list ">
			<ul class="txtContent dot">
				<?php
					echo LoopData::widget(['dataSource'=>$rows,'item'=>'page-empty']);
				?>
			</ul>
			<div class="floatRight">
				<?php echo LinkPager::widget([
			   		'pagination' => $pages,
			   	]);?>
			</div>
		</div>
	</div>
</div>

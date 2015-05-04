<?php

use yii\helpers\Html;
use yii\grid\GridView;
use components\LuLu;
use yii\widgets\LinkPager;
use components\helpers\TTimeHelper;
use components\widgets\LoopData;
use common\includes\DataSource;
use common\models\PageCategory;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var common\models\search\PageSearch $searchModel
 */


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
	<div class="columnRight">
		<div class="tbox border">
	        <div class="middleTitle3">
	            <h2>页面分类</h2>
	        </div>
	        <ul class="txtContent">
	        	<li><?php echo Html::a('全部',['page/index'])?> </li>
	        	<?php 
	        		$categories = PageCategory::findAll();
	        		foreach ($categories as $category):
	        	?>
	        	<li><?php echo Html::a($category['name'],['page/index','catid'=>$category['id']])?> </li>
	        	<?php endforeach;?>
	        </ul>
		</div>
	</div>
</div>

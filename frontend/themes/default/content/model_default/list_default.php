<?php

use yii\helpers\Html;
use yii\grid\GridView;
use components\LuLu;
use yii\widgets\LinkPager;
use components\helpers\TTimeHelper;
use components\widgets\LoopData;
use common\includes\DataSource;
use common\includes\CommonUtility;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\models\search\CatalogSearch $searchModel
 */

$title = empty($currentChannel['seo_title'])?$currentChannel['name']:$currentChannel['seo_title'];
$this->setTitle($title);

$this->registerMetaTag([
		'name'=>'keywords',
		'content'=>$currentChannel['seo_keywords'],
		]);
$this->registerMetaTag([
		'name'=>'description',
		'content'=>$currentChannel['seo_description'],
		]);

$this->buildBreadcrumbs($currentChannel['id']);

?>
<div class="container">
	<div class="columnMain">
		<div class="tbox border content-list ">
			<ul class="txtContent dot">
				<?php
					echo LoopData::widget(['dataSource'=>$rows,'item'=>'item-empty']);
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
		<div class="tbox border dot">
	        <div class="middleTitle3">
	            <h2><a href="node_7183298.htm" target="_blank" class="">阅读排行</a></h2>
	        </div>
	        <ul class="txtContent">
	        	<?php 
	        		$dataSource = DataSource::getContentByChannel($chnid,['order'=>'views desc']);
	        		echo LoopData::widget(['dataSource'=>$dataSource,'length'=>19]);
	        	?>
	        </ul>
	    </div>
	    <div class="tbox border">
	        
	        <div class="ad">
	        	<img alt="" src="<?php echo CommonUtility::getThemeUrl()?>/images/ad2.png">
	        </div>
	    </div>	    
	    <div class="tbox border dot">
	        <div class="middleTitle3">
	            <h2><a href="node_7183298.htm" target="_blank" class="">最新更新</a></h2>
	        </div>
	        <ul class="txtContent">
	        	<?php 
	        		$dataSource = DataSource::getContentByChannel($chnid,['order'=>'publish_time desc']);
	        		echo LoopData::widget(['dataSource'=>$dataSource,'length'=>19]);
	        	?>
	        </ul>
	    </div>
	    
	    <div class="tbox border">
	        <div class="middleTitle3">
	            <h2><a href="node_7183303.htm" target="_blank" class="">人物</a></h2>
	        </div>
	        <ul class="imgTxtContent1 size95x95">
	            <?php 
	        		$dataSource = DataSource::getContentByChannel($chnid,['order'=>'id desc','is_pic'=>true, 'limit'=>4]);
	        		echo LoopData::widget(['dataSource'=>$dataSource,'item'=>'item-imgtxt1', 'length'=>12]);
	        	?>
	        </ul>
	        <ul class="txtContent dot">
	        	<?php 
	        		$dataSource = DataSource::getContentByChannel($chnid,['order'=>'commonts desc','limit'=>4]);
	        		echo LoopData::widget(['dataSource'=>$dataSource,'length'=>19]);
	        	?>
	        </ul>
	    </div>
	</div>
</div>

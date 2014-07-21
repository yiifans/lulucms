<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\includes\DataSource;
use components\widgets\LoopData;
use components\LuLu;
use common\includes\CommonUtility;

/**
 * @var yii\web\View $this
 * @var app\models\Catalog $model
 */


$this->buildBreadcrumbs($chnid);
$this->addBreadcrumb($this->title);
?>
<div class="container">
	<div class="columnMain">
		<div class="tbox content-detail border">
	
			<h1><?= $model['title'] ?></h1>
		
			<div class="contentMeta">
				<span><?php echo $model['publish_time']?></span>|<span>点击：<?php echo $model['views']?></span>|<span>评论：<?php echo $model['commonts']?></span>
			</div>
			<?php if(!empty($model['summary'])):?>
			<div class="contentSummary border">
				<?php echo $model['summary'];?>
			</div>
			<?php endif;?>
			<div class="contentContent">
				<?php echo $model['content'];?>
			</div>
		</div>
		
	</div>
	<div class="columnRight">
	    <div class="tbox border">
	        
	        <div class="ad">
	        	<img alt="" src="<?php echo CommonUtility::getThemeUrl()?>/images/ad2.png">
	        </div>
	    </div>	
	    <div class="tbox border dot">
	        <div class="middleTitle3">
	            <h2><a href="node_7183298.htm" target="_blank" class="">点击排行</a></h2>
	        </div>
	        <ul class="txtContent">
	        	<?php 
	        		$dataSource = DataSource::getContentByChannel($chnid,['order'=>'views desc']);
	        		echo LoopData::widget(['dataSource'=>$dataSource,'length'=>19]);
	        	?>
	        </ul>
	    </div>	    
            <div class="tbox border">
                <div class="middleTitle3">
                    <h2><a href="xxx">图片新闻</a></h2>
                </div>
                <ul class="imgContent w120">
	                <?php 
		        		$dataSource = DataSource::getContentByChannel(103,['is_pic'=>true,'limit'=>4]);
		        		echo LoopData::widget(['dataSource'=>$dataSource,'item'=>'item-img', 'length'=>19]);
		        	?>
	        	
                </ul>
            </div>	    
	    <div class="tbox border dot">
	        <div class="middleTitle3">
	            <h2><a href="node_7183298.htm" target="_blank" class="">热点评论</a></h2>
	        </div>
	        <ul class="txtContent">
	        	<?php 
	        		$dataSource = DataSource::getContentByChannel($chnid,['order'=>'commonts desc']);
	        		echo LoopData::widget(['dataSource'=>$dataSource,'length'=>19]);
	        	?>
	        </ul>
	       
	    </div>	
	</div>
</div>


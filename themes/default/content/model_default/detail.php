<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\includes\DataSource;
use components\widgets\LoopData;
use components\LuLu;

/**
 * @var yii\web\View $this
 * @var app\models\Catalog $model
 */

$this->title = $model['title'];
$this->buildBreadcrumbs($chnid);
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
	<div class="columnMain">
		<div class="tbox content-detail">
	
			<h1><?= Html::encode($this->title) ?></h1>
		
			<table class="table">
				<tr>
					<th width="120px">名称</th>
					<th>值</th>
				</tr>
			
				<?php 
					foreach ($model as $name=>$value)
					{
						echo '<tr><td>'.$name.'</td><td>'.$value.'</td></tr>';
					}
				?>
			</table>
			
			
		</div>
	</div>
	<div class="columnRight">
	    <div class="tbox border">
	        
	        <div class="ad">
	        	<img alt="" src="<?php echo LuLu::getThemeUrl()?>/images/ad2.png">
	        </div>
	    </div>	
	    <div class="tbox border dot">
	        <div class="middleTitle3">
	            <h2><a href="node_7183298.htm" target="_blank" class="">点击排行</a></h2>
	        </div>
	        <ul class="txtContent">
	        	<?php 
	        		$dataSource = DataSource::getContentByChannel($chnid,['order'=>'views desc']);
	        		echo LoopData::widget(['dataSource'=>$dataSource,'params'=>['length'=>19]]);
	        	?>
	        </ul>
	    </div>	    
            <div class="tbox border">
                <div class="middleTitle3">
                    <h2><a href="xxx">图片新闻</a></h2>
                </div>
                <ul class="imgContent w120">
                    <li>
                        <a href="2014-06/30/content_32808434.htm">
                            <img src="http://images.china.cn/attachement/jpg/site1000/20140630/d02788e9b33e151af15f13.jpg" border="0" alt="云南举行&#8220;铁拳&#8221;反恐演习" /><br />
                        </a>
                        <a class="txt" href="xxx">云南举行“铁拳”反恐演习</a>
                    </li>
                    <li>
                        <a href="2014-06/30/content_32808434.htm">
                            <img src="http://images.china.cn/attachement/jpg/site1000/20140630/d02788e9b33e151af15f13.jpg" border="0" alt="云南举行&#8220;铁拳&#8221;反恐演习" /><br />
                        </a>
                        <a class="txt" href="xxx">云南举行“铁拳”反恐演习</a>
                    </li>
                    <li>
                        <a href="2014-06/30/content_32808434.htm">
                            <img src="http://images.china.cn/attachement/jpg/site1000/20140630/d02788e9b33e151af15f13.jpg" border="0" alt="云南举行&#8220;铁拳&#8221;反恐演习" /><br />
                        </a>
                        <a class="txt" href="xxx">云南举行“铁拳”反恐演习</a>
                    </li>
                    <li>
                        <a href="2014-06/30/content_32808434.htm">
                            <img src="http://images.china.cn/attachement/jpg/site1000/20140630/d02788e9b33e151af15f13.jpg" border="0" alt="云南举行&#8220;铁拳&#8221;反恐演习" /><br />
                        </a>
                        <a class="txt" href="xxx">云南举行“铁拳”反恐演习</a>
                    </li>
                </ul>
            </div>	    
	    <div class="tbox border dot">
	        <div class="middleTitle3">
	            <h2><a href="node_7183298.htm" target="_blank" class="">热点评论</a></h2>
	        </div>
	        <ul class="txtContent">
	        	<?php 
	        		$dataSource = DataSource::getContentByChannel($chnid,['order'=>'commonts desc']);
	        		echo LoopData::widget(['dataSource'=>$dataSource,'params'=>['length'=>19]]);
	        	?>
	        </ul>
	       
	    </div>	
	</div>
</div>


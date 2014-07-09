<?php 

use yii\helpers\Html;
use components\LuLu;
use yii\widgets\Breadcrumbs;

$this->beginInhritLayout('@app/views/layouts/main.php');

function getBlankPrefix($count)
{
	$ret='';
	for($i=0;$i<$count;$i++)
	{
		$ret.='&nbsp;&nbsp;&nbsp;&nbsp;';
	}
	return $ret;
}

?>

<?php $this->beginBlock('leftMenu');?> 
	    <div class="tbox">
	    	<div class="hd"><h2>内容管理</h2></div>
			<div class="bd">
				<ul>
					<?php 
						$channelArrayTree = LuLu::getAppParam('cachedChannels');
						
						foreach ($channelArrayTree as $channel)
						{
							$txt='';
							if($channel['is_leaf'])
							{
								$txt = '<a href="index.php?r=content/index&chnid='.$channel['id'].'">'.$channel['name'].'</a>';
							}
							else 
							{
								$txt = $channel['name'];
								
							}
							$txt = getBlankPrefix($channel['level']).$txt;
							echo '<li>'.$txt.'</li>';
						}
					?>
				
				</ul>
			</div>
		</div>
		<div class="tbox">
			<div class="hd"><h2>页面管理</h2></div>
			<div class="bd">
				<ul>
					<li><?= Html::a('增加页面', ['page/create']) ?></li>
					<li><?= Html::a('页面管理', ['page/index']) ?></li>
				</ul>
			</div>
		</div>
<?php $this->endBlock()?>

<?php echo $content ?>

<?php $this->endInhritLayout();?>







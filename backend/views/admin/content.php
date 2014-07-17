<?php 

use yii\helpers\Html;
use components\LuLu;
use yii\widgets\Breadcrumbs;
use yii\helpers\Url;

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
								$txt = '<a href="admin.php?r=content/index&chnid='.$channel['id'].'" target="mainFrame">'.$channel['name'].'</a>';
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
		







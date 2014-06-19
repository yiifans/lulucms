<?php 

use yii\helpers\Html;
use components\LuLu;

$this->beginContent('@app/views/layouts/main.php');

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

<table class="table">
  <tr>
    <td width="200px">
    
    <div class="tbox">
		<div class="bd">
			<ul>
				<?php 
					$channelArrayTree = LuLu::getAppParam('cachedChannels');
					
					foreach ($channelArrayTree as $channel)
					{
						$txt='<font color="red">';
						if($channel['is_leaf'])
						{
							$txt='<font color="red">'.$channel['name'].'</font>';
							$txt = getBlankPrefix($channel['level']).'<a href="index.php?r=content/index&chnid='.$channel['id'].'">'.$txt.'</a>';
						}
						else 
						{
							$txt=$channel['name'];
							
						}
						echo '<li>'.$txt.'</li>';
					}
				?>
			
			</ul>
		</div>
	</div>

    </td>
    <td><?= $content ?></td>
  </tr>
</table>

<?php $this->endContent();?>
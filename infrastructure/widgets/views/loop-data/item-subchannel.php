<?php

use yii\helpers\Html;
use components\helpers\TTimeHelper;
use components\widgets\LoopData;
use common\includes\DataSource;


?>

<?php
	$channel=$this->getCachedChannels($id);

	$style=$index%2===0?' floatLeft':' floatRight';
?>
	<div class="tbox border <?php echo $style; ?>" style="width:49%;">
		<div class="middleTitle2">
			<h2><?php echo $this->getChannelUrl($channel['id']);?></h2>
		</div>
		<ul class="imgTxtContent1 size95x95">
			<?php 
				$dataSource = DataSource::getContentByChannel($channel['id'],['limit'=>1]);
				echo LoopData::widget(['dataSource'=>$dataSource,'item'=>'item-imgtxt1']);
			?>
        </ul>
		<ul class="txtContent dot">
			<?php echo LoopData::widget(['dataSource'=>$row,'params'=>['length'=>18]])?>
		</ul>
	</div>
<?php 
	if($index%2===1)
	{
		echo '<div class="clear"></div>';
	}
?>


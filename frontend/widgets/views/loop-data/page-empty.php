<?php

use yii\helpers\Html;
use components\helpers\TTimeHelper;
use common\includes\UrlUtility;

?>

<li><?php echo UrlUtility::getPageLink($row);?><span class="time"><?php TTimeHelper::showTime($row['publish_time'],'m-d')?></span></li>
<?php 
	if(($index+1)%5===0)
	{
		echo '<li class="empty">&nbsp;</li>';
	}
?>





<?php

use yii\helpers\Html;
use yii\helpers\Url;
use common\includes\CommonUtility;
use common\includes\UrlUtility;

?>
<li>
	<a href="<?php echo UrlUtility::getContentUrl($row);?>">
		<img src="<?php echo CommonUtility::getTitlePic($row)?>" border="0" width="93" height="93" alt="<?php echo $row['title']?>" /></a>
	<h4><?php echo UrlUtility::getContentLink($row,$length);?></h4>
	<p><?php echo UrlUtility::getContentLink($row,40,['title'=>$row['summary']]);?></p>
</li>


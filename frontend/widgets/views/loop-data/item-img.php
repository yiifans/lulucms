<?php

use yii\helpers\Html;
use yii\helpers\Url;
use common\includes\CommonUtility;
use common\includes\UrlUtility;

?>
<li>
	<a href="<?php echo UrlUtility::getContentUrl($row);?>">
		<img src="<?php echo CommonUtility::getTitlePic($row)?>" border="0" width="135px" height="100px" alt="<?php echo $row['title']?>" /></a>
	<?php echo UrlUtility::getContentLink($row,$length,['class'=>'txt']);?>
</li>

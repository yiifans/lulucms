<?php

use yii\helpers\Html;
use components\helpers\TTimeHelper;
use common\includes\UrlUtility;


?>
<li><?php echo UrlUtility::getContentLink($row,$length);?><span class="time"><?php TTimeHelper::showTime($row['publish_time'],'m-d')?></span></li>

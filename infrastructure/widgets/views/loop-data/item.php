<?php

use yii\helpers\Html;
use components\helpers\TTimeHelper;


?>
<li><?php echo $this->getContentUrl($row,$length);?><span class="time"><?php TTimeHelper::showTime($row['publish_time'],'m-d')?></span></li>

<?php

use yii\helpers\Html;
use components\helpers\TTimeHelper;
use common\includes\UrlUtility;


?>
<li><a href="<?php echo $row['url']?>"><?php echo $row['title']?> </a><span class="time"><?php TTimeHelper::showTime($row['publish_time'],'m-d')?></span></li>

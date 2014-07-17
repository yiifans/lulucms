<?php

use yii\helpers\Html;
use yii\helpers\Url;
use common\includes\UrlUtility;

?>
<li>
<h4><?php echo UrlUtility::getContentLink($row,$length);?></h4>
<a href="<?php echo UrlUtility::getContentUrl($row);?>">
	<img src="http://images.china.cn/attachement/jpg/site1000/20140629/d02788e9b6d41519f4ac0b.jpg" border="0" alt="<?php echo $row['title']?>" />
</a>
<p><?php echo UrlUtility::getContentLink($row,0,['title'=>$row['summary']]);?></p>
</li>


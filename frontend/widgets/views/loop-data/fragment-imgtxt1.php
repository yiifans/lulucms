<?php

use yii\helpers\Html;
use yii\helpers\Url;
use common\includes\CommonUtility;
use common\includes\UrlUtility;

?>
<li>
	<a href="<?php echo $row['url'];?>">
		<img src="<?php echo CommonUtility::getTitlePic($row)?>" border="0" width="93" height="93" alt="<?php echo $row['title']?>" /></a>
	<h4><a href="<?php echo $row['url'];?>"><?php echo $row['title']?></a></h4>
	<p><?php echo $row['summary'];?></p>
</li>


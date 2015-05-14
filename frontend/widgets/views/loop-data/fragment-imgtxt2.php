<?php

use yii\helpers\Html;
use yii\helpers\Url;
use common\includes\UrlUtility;
use common\includes\CommonUtility;
use components\helpers\TStringHelper;

?>
<li>
<h4><a href="<?php echo $row['url'];?>"><?php echo TStringHelper::subStr($row['title'],$length)?></a></h4>
<a href="<?php echo $row['url'];?>">
	<img src="<?php echo CommonUtility::getTitlePic($row)?>" border="0" alt="<?php echo $row['title']?>" />
</a>
<p><?php echo $row['summary'];?></p>
</li>


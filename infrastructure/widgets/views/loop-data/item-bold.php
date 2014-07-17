<?php

use yii\helpers\Html;
use common\includes\UrlUtility;

?>
<?php 
	$boldStyle='';
	if($index%5===0)
	{
		$boldStyle=' class="bold"';
	}
?>
<li <?php echo $boldStyle?>><?php echo UrlUtility::getContentLink($row);?></li>

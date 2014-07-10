<?php

use yii\helpers\Html;

?>
<?php 
	$boldStyle='';
	if($index%5===0)
	{
		$boldStyle=' class="bold"';
	}
?>
<li <?php echo $boldStyle?>><?php echo $this->getContentUrl($row);?></li>

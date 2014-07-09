<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>
<li>
	<a href="<?php echo $this->getContentUrl($row,0,false);?>">
		<img src="http://images.china.cn/attachement/jpg/site1000/20140629/d02788e9b6d41519f14d08.jpg" border="0" width="93" height="93" alt="<?php echo $row['title']?>" /></a>
	<h4><?php echo $this->getContentUrl($row,14);?></h4>
	<p><?php echo $this->getContentUrl($row,0,['title'=>$row['title']]);?></p>
</li>


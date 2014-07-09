<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>
<li>
<h4><?php echo Html::a($row['title'],['content/detail','id'=>$row['id'],'chnid'=>$row['channel_id']])?></h4>
<a href="<?php echo Url::to(['content/detail','id'=>$row['id'],'chnid'=>$row['channel_id']]) ?>">
	<img src="http://images.china.cn/attachement/jpg/site1000/20140629/d02788e9b6d41519f4ac0b.jpg" border="0" alt="<?php echo $row['title']?>" />
</a>
<p><?php echo Html::a($row['summary'],['content/detail','id'=>$row['id'],'chnid'=>$row['channel_id']])?></p>
</li>


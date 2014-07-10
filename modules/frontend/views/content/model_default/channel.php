<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\models\search\CatalogSearch $searchModel
 */

$this->title = $currentChannel->name;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-channel">

<?php
	$index=0;
	
 	foreach ($dataList as $id=>$value)
	{
		if(count($value)==0)
		{
			//continue;
		}
		
		$channel=$this->getCachedChannels($id);
		
		$index+=1;
		if($index%2==0)
		{
			$style=' floatRight';
		}
		else 
		{
			$style=' floatLeft';
		}
?>
	<div class="tbox border <?php echo $style; ?>" style="width:49%;">
		<div class="hd">
			<h2>
			<?php 
				if($channel['is_leaf'])
				{
					echo Html::a('<font color="red">'.$channel['name'].'</font>', ['list','chnid'=>$channel['id']]);
				}
				else
				{
					echo Html::a($channel['name'], ['channel','chnid'=>$channel['id']]);
				}
			?></h2>
		</div>
		<div class="bd">
			<ul>
				<?php foreach ($value as $row ): ?>
				<li>
					<?= Html::a($row['title'], ['detail','chnid'=>$row['channel_id'],'id'=>$row['id']]) ?>
					<span class="time"><?php echo $row['publish_time']?></span>
				</li>
				<?php endforeach;?>
			</ul>
		</div>
	</div>
<?php 
		if($index%2==0)
		{
			echo '<div class="clear"></div>';
		}
	}
?>
	

</div>

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
<div class="catalog-index">

<?php
	$index=0;
	
 	foreach ($dataList as $id=>$value)
	{
		if(count($value)==0)
		{
			//continue;
		}
		
		$channel=$this->params['cachedChannel'][$id];
		
		$index+=1;
		if($index%2==0)
		{
			$style=' floatr';
		}
		else 
		{
			$style=' floatl';
		}
?>
	<div class="tbox border <?php echo $style; ?>" style="width:49%;">
		<div class="hd">
			<h2>
			<?php 
				if($channel['is_leaf'])
				{
					echo '<a href="index.php?r=content/list&chnid='.$channel['id'].'"><font color="red">'.$channel['name'].'</font></a>';
				}
				else
				{
					echo '<a href="index.php?r=content/index&chnid='.$channel['id'].'">'.$channel['name'].'</a>';
				}
			?></h2>
		</div>
		<div class="bd">
			<ul>
				<?php foreach ($value as $row ): ?>
				<li><a href="index.php?r=content/view&id=<?php echo $row['id']?>&chnid=<?php echo $row['channel_id']?>" target="_blank"><?php echo $row['title']?></a>
				<span class="time"><?php echo $row['publish_time']?></span></li>
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

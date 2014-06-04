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

<table width="100%">
<tr>
<td valign="top">
	<div class="tbox">
		<div class="hd">
			<h2>头条</h2>
		</div>
		<div class="bd">
			<ul>
				<?php foreach ($att1DataList as $row):?>
				<li><a href="index.php?r=content/view&id=<?php echo $row['id']?>&chnid=<?php echo $row['channel_id']?>" target="_blank"><?php echo $row['title']?></a></li>
				<?php endforeach;?>
			</ul>
		</div>
	</div>
</td>
<td valign="top">
	<div class="tbox">
		<div class="hd">
			<h2>推荐</h2>
		</div>
		<div class="bd">
			<ul>
				<?php foreach ($att2DataList as $row):?>
				<li><a href="index.php?r=content/view&id=<?php echo $row['id']?>&chnid=<?php echo $row['channel_id']?>" target="_blank"><?php echo $row['title']?></a></li>
				<?php endforeach;?>
			</ul>
		</div>
	</div>
</td>
<td valign="top">
	<div class="tbox">
		<div class="hd">
			<h2>置顶</h2>
		</div>
		<div class="bd">
			<ul>
				<?php foreach ($att3DataList as $row):?>
				<li><a href="index.php?r=content/view&id=<?php echo $row['id']?>&chnid=<?php echo $row['channel_id']?>" target="_blank"><?php echo $row['title']?></a></li>
				<?php endforeach;?>
			</ul>
		</div>
	</div>
</td>
</tr>
</table>
<?php
	
	function getItemStyle($index,$num,$styles)
	{
		$i=$index%$num;
		return $styles[$i];
	}
	
	$index=0;
	
 	foreach ($dataList as $id=>$value)
	{
		if(count($value)==0)
		{
			//continue;
		}
		
		$channel=$this->params['cachedChannel'][$id];
		
		$index+=1;
		$style=getItemStyle($index, 2, [' floatr',' floatl']);
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

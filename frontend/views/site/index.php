<?php
use yii\helpers\VarDumper;
/**
 * @var yii\web\View $this
 */
$this->title = 'My Yii Application';
?>
<div class="site-index">

	<div class="w685 floatl">
		<div class="tbox border">
			<div class="hd">
				<h2>title</h2>
			</div>
			<div class="bd">
				<ul>
					<li>股优酷土豆：持股16.5% CEO进董事会</li>
					<li>股优酷土豆：持股16.5% CEO进董事会</li>
					<li>股优酷土豆：持股16.5% CEO进董事会</li>
					<li>股优酷土豆：持股16.5% CEO进董事会</li>
					<li>股优酷土豆：持股16.5% CEO进董事会</li>
					<li>股优酷土豆：持股16.5% CEO进董事会</li>
					<li>股优酷土豆：持股16.5% CEO进董事会</li>
					<li>股优酷土豆：持股16.5% CEO进董事会</li>
				</ul>
			</div>
		</div>
	<?php
		$index=0; 
		foreach ($dataList as $id=>$value)
		{
			$channel=$this->params['cachedChannels'][$id];
			
			$index+=1;
			$style=' floatl';
			if($index%2==0)
			{
				$style=' floatr';
			}
	?>
		<div class="tbox w335 border<?php echo $style?>">
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
				?>
				</h2>
			</div>
			<div class="bd">
				<ul>
					<?php foreach ($value as $row):?>
					<li><a href="index.php?r=content/view&id=<?php echo $row['id']?>&chnid=<?php echo $row['channel_id']?>" target="_blank"><?php echo $row['title']?></a>
						<span class="time"><?php echo date('m-d',strtotime($row['publish_time']))?></span></li>
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
	<div class="w300 floatr">
		<div class="tbox border">
			<div class="hd">
				<h2>头条</h2>
			</div>
			<div class="bd">
				<ul>
					<?php foreach ($att1DataList as $row):?>
					<li><?php echo $row['title']?></li>
					<?php endforeach;?>
				</ul>
			</div>
		</div>
		<div class="tbox border">
			<div class="hd">
				<h2>推荐</h2>
			</div>
			<div class="bd">
				<ul>
					<?php foreach ($att2DataList as $row):?>
					<li><?php echo $row['title']?></li>
					<?php endforeach;?>
				</ul>
			</div>
		</div>
		<div class="tbox border">
			<div class="hd">
				<h2>置顶</h2>
			</div>
			<div class="bd">
				<ul>
					<?php foreach ($att3DataList as $row):?>
					<li><?php echo $row['title']?></li>
					<?php endforeach;?>
				</ul>
			</div>
		</div>
		<div class="tbox border">
			<div class="hd">
				<h2>点击</h2>
			</div>
			<div class="bd">
				<ul>
					<?php foreach ($att3DataList as $row):?>
					<li><?php echo $row['title']?></li>
					<?php endforeach;?>
				</ul>
			</div>
		</div>
		<div class="tbox border">
			<div class="hd">
				<h2>最新</h2>
			</div>
			<div class="bd">
				<ul>
					<?php foreach ($att3DataList as $row):?>
					<li><?php echo $row['title']?></li>
					<?php endforeach;?>
				</ul>
			</div>
		</div>
	</div>
	
</div>

<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\models\search\CatalogSearch $searchModel
 */

$this->title = 'Content';
$this->params['breadcrumbs'][] = $this->title;
function getBlankPrefix($count)
{
	$ret='';
	for($i=0;$i<$count;$i++)
	{
		$ret.='&nbsp;&nbsp;&nbsp;&nbsp;';
	}
	return $ret;
}
?>
<div class="catalog-index">


	
<table width="100%">
<tr>
<td width="160px" valign="top">
	<div class="nolisttype">
		<ul>
			<?php 
				foreach ($channelArrayTree as $channel)
				{
					$txt='<font color="red">';
					if($channel['is_leaf'])
					{
						$txt='<font color="red">'.$channel['name'].'</font>';
						$txt = getBlankPrefix($channel['level']).'<a href="index.php?r=content/index&chnid='.$channel['id'].'">'.$txt.'</a>';
					}
					else 
					{
						$txt=$channel['name'];
						
					}
					echo '<li>'.$txt.'</li>';
				}
			?>
			
			
		</ul>
	</div>
</td>
<td valign="top">
	
	<?= Html::a('新建内容', ['create', 'chnid' => $chnid], ['class' => 'btn btn-primary']) ?>(<?php echo $currentChannel->name;?>)

<table class="table">
    <tr class="tb_header">
      <th width="40px"> ID</th>
      <th>title</th>
      <th width="10%">do</th>
    </tr>
	<?php foreach ($rows as $row ): ?>
	<tr>
	<td><?php echo $row['id']?></td>
	<td><?php echo $row['title']?></td>
	<td><?= Html::a('编辑', ['update', 'chnid' => $row['channel_id'],'id'=>$row['id']]) ?></td>
	</tr>
	<?php endforeach;?>
</table>

</td>
</tr>
</table>

</div>

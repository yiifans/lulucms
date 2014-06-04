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
				foreach ($channelTree as $channel)
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
	
<a href="index.php?r=content/create&chnid=<?php echo $chnid ?>" class="btn btn-success" >Create Content</a>
(<?php echo $currentChannel->name;?>)
<table width="100%" class="table">
    <tr class="tb_header">
      <th width="40px"> ID</th>
      <th>title</th>
      <th width="10%">do</th>
    </tr>
	<?php foreach ($dataList as $row ): ?>
	<tr>
	<td><?php echo $row['id']?></td>
	<td><?php echo $row['title']?></td>
	<td><?php echo ''?></td>
	</tr>
	<?php endforeach;?>
</table>

</td>
</tr>
</table>

</div>

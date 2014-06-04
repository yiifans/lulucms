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

<?php foreach ($dataList as $name=>$value):?>
		<div class="tbox">
			<div class="hd">
				<h2>
				<?php 
					$channel=$this->params['cachedChannel'][$name];
					if($channel['is_leaf'])
					{
						echo '<li><a href="index.php?r=content/list&chnid='.$channel['id'].'"><font color="red">'.$channel['name'].'</font></a></li>';
					}
					else
					{
						echo '<li><a href="index.php?r=content/index&chnid='.$channel['id'].'">'.$channel['name'].'</a></li>';
					}
				?></h2>
			</div>
			<div class="bd">
				<ul>
				<?php foreach ($value as $data):?>
					<li><?php echo $data['title']?></li>
					<?php endforeach;?>
				</ul>
			</div>
		</div>
	<?php endforeach;?>
	

</div>

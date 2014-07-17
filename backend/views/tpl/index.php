<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var common\models\search\TplConverSearch $searchModel
 */

$this->title = '模板管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tpl-index">
	<div class="tbox floatl">
		<div class="bd">
			<ul>
			<li><a href="index.php?r=tpl/index&d=.">返回上一层</a> </li>
			
				<?php 
				
					foreach ($dirs as $dir)
					{
						if($dir=='.'||$dir=='..')
						{
							continue;
						}
						
						$tempDir=$parentDirFull.'\\'.$dir;
						$a;
						
						if(is_dir($tempDir))
						{
							$a='<a href="index.php?r=tpl/index&d='.$parentDir.'\\'.$dir.'">'.$dir.'</a>';
						}
						else 
						{
							$a='<a href="index.php?r=tpl/update&d='.$parentDir.'&&file='.$dir.'">'.$dir.'</a>';
						}
						echo '<li>'.$a.'</li>';
					}
				?>
			</ul>
		</div>
	</div>
	
	
	
</div>
















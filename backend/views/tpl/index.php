<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var common\models\search\TplConverSearch $searchModel
 */

$this->title = 'Template Manage';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tpl-index">

	<h1><?= Html::encode($this->title) ?></h1>

	<div class="floatl">
	<div class="tbox">
		<div class="hd">
			<h2>首页模板</h2>
		</div>
		<div class="bd">
			<ul>
				<li><a href="/advanced/backend/web/index.php?r=tplindex">管理首页模板</a></li>
				<li>aaaaa</li>
			</ul>
		</div>
	</div>
	<div class="tbox">
		<div class="hd">
			<h2>封面模板</h2>
		</div>
		<div class="bd">
			<ul>
				<li><a href="/advanced/backend/web/index.php?r=tplcover">管理封面模板</a></li>
				<li>管理封面模板分类</li>
			</ul>
		</div>
	</div>	
	<div class="tbox">
		<div class="hd">
			<h2>列表模板</h2>
		</div>
		<div class="bd">
			<ul>
				<li><a href="/advanced/backend/web/index.php?r=tpllist">管理列表模板</a></li>
				<li>管理列表模板分类</li>
			</ul>
		</div>
	</div>	
	<div class="tbox">
		<div class="hd">
			<h2>视图模板</h2>
		</div>
		<div class="bd">
			<ul>
				<li><a href="/advanced/backend/web/index.php?r=tplview">管理视图模板</a></li>
				<li>管理视力模板分类</li>
			</ul>
		</div>
	</div>	
	<div class="tbox">
		<div class="hd">
			<h2>表单模板</h2>
		</div>
		<div class="bd">
			<ul>
				<li><a href="/advanced/backend/web/index.php?r=tplform">管理表单模板</a></li>
				<li>管理表单模板分类</li>
			</ul>
		</div>
	</div>	
	<div class="tbox">
		<div class="hd">
			<h2>aaaaaa</h2>
		</div>
		<div class="bd">
			<ul>
				<li>aaaaa</li>
				<li>aaaaa</li>
			</ul>
		</div>
	</div>	
	</div>
	
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
							$a='<a href="index.php?r=tpl/update&file='.$parentDir.'\\'.$dir.'">'.$dir.'</a>';
						}
						echo '<li>'.$a.'</li>';
					}
				?>
			</ul>
		</div>
	</div>
	
	
</div>
















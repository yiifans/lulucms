<?php
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yii\helpers\Url;

?>

<div class="tbox">
	<div class="hd">
		<h2>频道管理</h2>
	</div>
	<div class="bd">
		<ul>
			<li><?= Html::a('频道管理', ['channel/index'],['target'=>'mainFrame']) ?></li>
			<li><?= Html::a('新建频道', ['channel/create'],['target'=>'mainFrame']) ?></li>
		</ul>
	</div>
</div>
<div class="tbox">
	<div class="hd">
		<h2>页面管理</h2>
	</div>
	<div class="bd">
		<ul>
			<li><?= Html::a('页面管理', ['page/index'],['target'=>'mainFrame']) ?></li>
			<li><?= Html::a('页面分类', ['page-category/index'],['target'=>'mainFrame']) ?></li>
		</ul>
	</div>
</div>

<div class="tbox">
	<div class="hd">
		<h2>碎片管理</h2>
	</div>
	<div class="bd">
		<ul>
			<li><?= Html::a('代码碎片', ['fragment/index','type'=>1],['target'=>'mainFrame']) ?></li>
			<li><?= Html::a('静态碎片', ['fragment/index','type'=>2],['target'=>'mainFrame']) ?></li>
			<li><?= Html::a('动态碎片', ['fragment/index','type'=>3],['target'=>'mainFrame']) ?></li>
		</ul>
	</div>
</div>

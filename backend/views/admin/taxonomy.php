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
				<h2>页面分类</h2>
			</div>
			<div class="bd">
				<ul>
					<li><?= Html::a('页面分类', ['page-category/index'],['target'=>'mainFrame']) ?></li>
					<li><?= Html::a('新建分类', ['page-category/create'],['target'=>'mainFrame']) ?></li>
				</ul>
			</div>
		</div>

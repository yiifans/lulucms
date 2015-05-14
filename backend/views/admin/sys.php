<?php
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use components\widgets\InhritLayout;
use yii\helpers\Url;

?>

<div class="tbox">
	<div class="hd">
		<h2>系统设置</h2>
	</div>
	<div class="bd">
		<ul>
			<!-- 
					<li><?= Html::a('系统设置', ['config/index'],['target'=>'mainFrame']) ?></li>
					 -->
			<li><?= Html::a('基本信息', ['config/site'],['target'=>'mainFrame']) ?></li>
			<li><?= Html::a('SEO设置', ['config/seo'],['target'=>'mainFrame']) ?></li>

		</ul>
	</div>
</div>
<div class="tbox">
	<div class="hd">
		<h2>数据字典</h2>
	</div>
	<div class="bd">
		<ul>
			<li><?= Html::a('数据字典', ['dict-category/index'],['target'=>'mainFrame']) ?></li>
			<li><?= Html::a('自定义变量', ['variable/index'],['target'=>'mainFrame']) ?></li>
		</ul>
	</div>
</div>
<div class="tbox">
	<div class="hd">
		<h2>内容模型</h2>
	</div>
	<div class="bd">
		<ul>
			<li><?= Html::a('模型管理', ['define-table/index'],['target'=>'mainFrame']) ?></li>
			<li><?= Html::a('新建模型', ['define-table/create'],['target'=>'mainFrame']) ?></li>
			<li><?= Html::a('内容属性', ['config/content'],['target'=>'mainFrame']) ?></li>
			<li><?= Html::a('聚合标签', ['content-flag/index'],['target'=>'mainFrame']) ?></li>
		</ul>
	</div>
</div>

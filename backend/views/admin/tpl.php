<?php 

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yii\helpers\Url;

?>
	
		<div class="tbox">
			<div class="hd">
				<h2>在线编辑</h2>
			</div>
			<div class="bd">
				<ul>
					<li><?= Html::a('前台应用', ['/filemanager'],['target'=>'mainFrame']) ?></li>
				
				</ul>
			</div>
		</div>
		
	    <div class="tbox">
			<div class="hd">
				<h2>主题</h2>
			</div>
			<div class="bd">
				<ul>
					<?php 
						foreach ($themes as $theme)
						{
							if($theme==='.'||$theme==='..')
							{
								continue;
							}
					?>
					<li><?= Html::a($theme, ['/filemanager','currentdir'=>'\themes', 'name'=>$theme],['target'=>'mainFrame']) ?></li>
					<?php }?>
				</ul>
			</div>
		</div>
		<!-- 
		<div class="tbox">
			<div class="hd">
				<h2>模型模板</h2>
			</div>
			<div class="bd">
				<ul>
					<li><?= Html::a('频道页模板', ['tpl/model-channel'],['target'=>'mainFrame']) ?></li>
					<li><?= Html::a('列表页模板', ['tpl/model-list'],['target'=>'mainFrame']) ?></li>
					<li><?= Html::a('内容页模板', ['tpl/model-detail'],['target'=>'mainFrame']) ?></li>
				</ul>
			</div>
		</div>	
		<div class="tbox">
			<div class="hd">
				<h2>自定义模板</h2>
			</div>
			<div class="bd">
				<ul>
					<li><?= Html::a('自定义列表模板', ['tpl/custom-list'],['target'=>'mainFrame']) ?></li>
					<li><?= Html::a('自定义页面模板', ['tpl/custom-page'],['target'=>'mainFrame']) ?></li>
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
					<li><a href="/advanced/backend/web/index.php?r=tplformcategory">管理表单模板分类</a></li>
				</ul>
			</div>
		</div>	
		<div class="tbox">
			<div class="hd">
				<h2>循环项模板</h2>
			</div>
			<div class="bd">
				<ul>
					<li><a href="/advanced/backend/web/index.php?r=tplitem">管理循环项模板</a></li>
					<li><a href="/advanced/backend/web/index.php?r=tplitemcategory">管理循环项模板分类</a></li>
				</ul>
			</div>
		</div>	
 -->

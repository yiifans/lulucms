<?php $this->beginContent('@app/views/layouts/main.php');?>

<table class="table">
  <tr>
    <td width="200px">
    	<div class="tbox">
		<div class="hd">
			<h2>首页模板</h2>
		</div>
		<div class="bd">
			<ul>
				<li><a href="/advanced/backend/web/index.php?r=tplindex">管理首页模板</a></li>
			</ul>
		</div>
	</div>
	<div class="tbox">
		<div class="hd">
			<h2>封面模板</h2>
		</div>
		<div class="bd">
			<ul>
				<li><a href="/advanced/backend/web/index.php?r=tplchannel">管理封面模板</a></li>
				<li><a href="/advanced/backend/web/index.php?r=tplchannelcategory">管理封面模板分类</a></li>
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
				<li><a href="/advanced/backend/web/index.php?r=tpllistcategory">管理列表模板分类</a></li>
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
				<li><a href="/advanced/backend/web/index.php?r=tplviewcategory">管理视力模板分类</a></li>
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
    </td>
    <td><?= $content ?></td>
  </tr>
</table>

<?php $this->endContent();?>
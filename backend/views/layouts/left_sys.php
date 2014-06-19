<?php 

use yii\helpers\Html;

$this->beginContent('@app/views/layouts/main.php');
?>

<table class="table">
  <tr>
    <td width="200px">
    	<div class="tbox">
			<div class="hd">
				<h2>系统设置</h2>
			</div>
			<div class="bd">
				<ul>
					<li><?= Html::a('系统设置', ['config/index']) ?></li>
				</ul>
			</div>
		</div>
		<div class="tbox">
			<div class="hd">
				<h2>数据字典</h2>
			</div>
			<div class="bd">
				<ul>
					<li><li><?= Html::a('数据字典', ['dict-category/index']) ?></li></li>
				</ul>
			</div>
		</div>	
		<div class="tbox">
			<div class="hd">
				<h2>内容模型</h2>
			</div>
			<div class="bd">
				<ul>
					<li><?= Html::a('内容模型', ['definetable/index']) ?></li>
					<li><?= Html::a('新建模型', ['definetable/create']) ?></li>
				</ul>
			</div>
		</div>	

    </td>
    <td><?= $content ?></td>
  </tr>
</table>

<?php $this->endContent();?>
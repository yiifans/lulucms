<?php 

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

$this->beginInhritLayout('@app/views/layouts/main.php');
?>

<?php $this->beginBlock('leftMenu');?> 
	    <div class="tbox">
			<div class="hd">
				<h2>频道管理</h2>
			</div>
			<div class="bd">
					<ul>
						<li><?= Html::a('频道管理', ['channel/index']) ?></li>
						<li><?= Html::a('新建频道', ['channel/create']) ?></li>
				</ul>
			</div>
		</div>
		<div class="tbox">
			<div class="hd">
				<h2>页面分类</h2>
			</div>
			<div class="bd">
				<ul>
					<li><?= Html::a('页面分类', ['page-category/index']) ?></li>
					<li><?= Html::a('新建分类', ['page-category/create']) ?></li>
				</ul>
			</div>
		</div>
<?php $this->endBlock()?>

<?php echo $content ?>

<?php $this->endInhritLayout();?>
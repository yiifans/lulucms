<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use components\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use components\widgets\Alert;
use frontend\assets\ThemeAsset;
use yii\helpers\Url;
use common\includes\CommonUtility;

/**
 * @var \yii\web\View $this
 * @var string $content
 */

ThemeAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
	<meta charset="<?= Yii::$app->charset ?>"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= Html::encode($this->title) ?></title>
	<?php $this->head() ?>
</head>
<body>
	<?php $this->beginBody() ?>
	<div class="wrap">
		<div class="container border" id="topbar">
			<div class="floatRight">
				<?php 
					echo Html::a('git地址','http://www.github.com/yiifans/lulucms',['target'=>'_blank']);
					if (Yii::$app->user->isGuest) {
						echo Html::a('注册',['/site/signup']);
						echo Html::a('登录',['/site/login']);
					} else {
						echo Html::a('退出 (' . Yii::$app->user->identity->username .')',['/site/logout']);
					}
					echo Html::a('后台','@web/admin.php',['target'=>'_blank']);
				?>
			</div>		
		</div>
		<div class="clear"></div>
		<div class="container border" id="header">
			<div class="logo">
				<h1><a href="">LuLu CMS</a></h1>
			</div>
		</div>
		<!-- Channels -->
		<div class="container navContainer">
			<div class="nav">
				<ul>
					<li class="currclass"><a href="index.php">首页</a></li>
					<?php 
						foreach ($this->rootChannels as $channel)
						{
							if($channel['is_leaf'])
							{
								echo '<li><a href="index.php?r=content/list&chnid='.$channel['id'].'"><font color="red">'.$channel['name'].'</font></a></li>';
							}
							else
							{
								echo '<li><a href="index.php?r=content/channel&chnid='.$channel['id'].'">'.$channel['name'].'</a></li>';
							}
						}
					?>
					<li><a href="<?php echo Url::to(['page/detail','id'=>1])?>">关于</a></li>
					<li><?php echo Html::a('Yii中文社区','http://www.yiifans.com',['target'=>'_blank']);?></li>
					<li><?php echo Html::a('Yii 2.0 中文权威指南','http://www.yiifans.com/yii2/guide/',['target'=>'_blank']);?></li>
				</ul>
			</div>
		</div>
		<div class="clear"></div>
		
		<div class="container breadcrumbContainer">
			<?= Breadcrumbs::widget([
				'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
			]) ?>		
		</div>
		<div class="clear"></div>
		
		<?= $content ?>
	
	</div>
	<div class="clear"></div>
	<footer class="footer">
		<div class="container">
		<p class="pull-left">&copy; My Company <?= date('Y') ?></p>
		<p class="pull-right"><?= Yii::powered() ?></p>
		</div>
	</footer>

	<?php echo CommonUtility::getCachedConfigValue('site_stats');?>
	<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

<?php
use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use components\widgets\Alert;

/**
 * @var \yii\web\View $this
 * @var string $content
 */
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
	<meta charset="<?= Yii::$app->charset ?>"/>
	<title><?= Html::encode($this->title) ?></title>
	<?php $this->head() ?>
</head>
<body  style="padding-top: 70px;">
	<?php $this->beginBody() ?>
	<?php
		NavBar::begin([
			'brandLabel' => 'LuLu CMS',
			'brandUrl' => Yii::$app->homeUrl,
			'options' => [
				'class' => 'navbar-inverse navbar-fixed-top',
			],
		]);
		$menuItems = [
			
			['label' => '首页', 'url' => ['admin/index']],
			['label' => '设置', 'url' => ['admin/sys']],
			['label' => '分类', 'url' => ['admin/taxonomy']],
			['label' => '内容', 'url' => ['admin/content']],
			['label' => '模板', 'url' => ['admin/tpl']],
		];
		
		if (Yii::$app->user->isGuest) {
			$menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
		} else {
			$menuItems[] = ['label' => 'Logout (' . Yii::$app->user->identity->username .')' , 'url' => ['/site/logout']];
		}
		echo Nav::widget([
				'options' => ['class' => 'navbar-nav navbar-right'],
				'items' => $menuItems,
				]);
		NavBar::end();
	?>

	<div class="container">
		<?= Alert::widget() ?>
		<?= $content ?>
	</div>

	<footer class="footer">
		<div class="container">
		<p class="pull-left">&copy; My Company <?= date('Y') ?></p>
		<p class="pull-right"><?= Yii::powered() ?></p>
		</div>
	</footer>

	<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

<?php
use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;

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
<body>
	<?php $this->beginBody() ?>
	<?php
		NavBar::begin([
			'brandLabel' => 'My Company',
			'brandUrl' => Yii::$app->homeUrl,
			'options' => [
				'class' => 'navbar-inverse navbar-fixed-top',
			],
		]);
		$menuItems = [
			
			['label' => 'Home', 'url' => ['/site/index']],
			['label' => 'Define Table', 'url' => ['/definetable/index']],
			//['label' => 'Define Table Field', 'url' => ['/definetablefield/index']],
			//['label' => 'Define Model', 'url' => ['/definemodel/index']],
			//['label' => 'Define Model Field', 'url' => ['/definemodelfield/index']],
			['label' => 'Channel', 'url' => ['/channel/index']],
			['label' => 'Content', 'url' => ['/content/index']],
			['label' => 'Index Tpl', 'url' => ['/tplindex/index']],
			['label' => 'Channel Tpl', 'url' => ['/tplchannel/index']],
			['label' => 'List Tpl', 'url' => ['/tpllist/index']],
			['label' => 'View Tpl', 'url' => ['/tplview/index']],
			['label' => 'Form Tpl', 'url' => ['/tplform/index']],
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
	<?= Breadcrumbs::widget([
		'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
	]) ?>
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

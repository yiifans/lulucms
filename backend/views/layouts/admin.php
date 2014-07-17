<?php
use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use components\widgets\Alert;
use yii\helpers\Url;

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
<body style="margin:0px; padding-top: 70px;" scroll="no">
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
// 		echo Nav::widget([
// 			'options' => ['class' => 'navbar-nav navbar-left'],
// 			'items' => $menuItems,
// 		]);

// 		$menuItems=[];
		if (Yii::$app->user->isGuest) {
			$menuItems[] = ['label' => '登录', 'url' => ['/site/login']];
		} else {
			$menuItems[] = ['label' => '退出 (' . Yii::$app->user->identity->username .')' , 'url' => ['/site/logout']];
		}
		$menuItems[] = ['label' => '前台', 'url' => '@web/index.php'];
		echo Nav::widget([
				'options' => ['class' => 'navbar-nav navbar-right'],
				'items' => $menuItems,
				]);
		NavBar::end();
	?>

	
	<table class="table" style="height: 99%;border:none;padding:0px;margin:0px;">
	  <tr>
	    <td class="leftMenu" style="vertical-align: top;pading:0px;margin:0px;">
    		<?php echo $content ?>
	    </td>
	    <td class="mainContent" style="vertical-align: top;padding:0px;margin:0px;">
	    	
			<iframe src="<?php echo Url::to(['admin/welcome'])?>" id="mainFrame" name="mainFrame" width="100%" height="100%" frameborder="0" scrolling="yes" style="overflow: visible;display:"></iframe>
	    </td>
	  </tr>
	</table>
	

	<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

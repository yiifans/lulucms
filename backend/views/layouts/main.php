<?php
use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use components\widgets\Alert;
use yii\helpers\Url;

/**
 *
 * @var \yii\web\View $this
 * @var string $content
 */
AppAsset::register($this);
?>
<?php $this->beginPage()?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
<meta charset="<?= Yii::$app->charset ?>" />
<title><?= Html::encode($this->title) ?></title>
	<?php $this->head()?>
</head>
<body>
	<?php $this->beginBody()?>

	<div class="container" style="padding: 8px; padding-bottom: 40px;">
		<div class="breadcrumbContainer">
			<?= Breadcrumbs::widget([
					'homeLink'=>false,
				'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : []])?>
		</div>
		<?= Alert::widget()?>
		
		<?php echo $content?>
	</div>
	<?php $this->endBody()?>
</body>
</html>
<?php $this->endPage() ?>

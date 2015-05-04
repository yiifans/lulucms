

<?php
use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use components\widgets\Alert;

use yii\widgets\ActiveForm;

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
	<title>登录管理中心——LuLu CMS</title>
	<?php $this->head() ?>
</head>
<body style="height: auto;">
	<?php $this->beginBody() ?>
	<table style="width:340px; height:auto;margin: 120px auto 0;">
		<tr>
			
			<td valign="top">
			<h1>LuLu CMS 管理中心</h1>
			<div>
			<?php $form = ActiveForm::begin([
					'id' => 'login-form',
					'fieldConfig'=>[
						'options' => ['tag' => 'tr','class' => 'form-group'],
						'template' => '<td class="hAlign_left padding_r10" width="70" style="border: none;">{label}:</td><td style="border: none;">{input}</td>',
						
					]
			]);?>
				<table class="table" style="border: none;">
					<?= $form->field($model, 'username') ?>
					<?= $form->field($model, 'password')->passwordInput() ?>
					<tr class="form-group">
						<td class="hAlign_left padding_r10" style="border: none;">&nbsp;</td>
						<td style="border: none;">
							<?= Html::submitButton('登录', ['class' => 'btn btn-primary']) ?>
						</td>
					</tr>
				</table>
			<?php ActiveForm::end(); ?>
			</div>
			</td>
		</tr>
	</table>
	<table style="width:600px; height:auto;margin: 120px auto 0;">
		<tr>
			<td>
				<div class="container">
					<p class="pull-left">&copy; My Company <?= date('Y') ?></p>
					<p class="pull-right"><?= Yii::powered() ?></p>
				</div>
			</td>
		</tr>
	</table>

	<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>



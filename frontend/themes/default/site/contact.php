<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;
use yii\web\View;

/**
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var app\models\ContactForm $model
 */
$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;

$this->registerCssFile('libs/kindeditor/themes/default/default.css');
$this->registerJsFile('libs/kindeditor/kindeditor-min.js');
$this->registerJsFile('libs/kindeditor/lang/zh_CN.js');

$js=<<<JS
			var editor;
			KindEditor.ready(function(K) {
				editor = K.create('textarea[name="body"]', {
					allowFileManager : true
				});
			});
JS;
$this->registerJs($js,View::POS_END);

?>
<div class="site-contact">
	<h1><?= Html::encode($this->title) ?></h1>

	<p>
		If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
	</p>

	<div class="row">
		<div class="col-lg-5">
			<?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
				<?= $form->field($model, 'name') ?>
				<?= $form->field($model, 'email') ?>
				<?= $form->field($model, 'subject') ?>
				<?= $form->field($model, 'body')->textArea(['name'=>'body','style'=>'width:800px;height:400px;visibility:hidden;']) ?>
				<?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
					'options' => ['class' => 'form-control'],
					'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
				]) ?>
				<div class="form-group">
					<?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
				</div>
			<?php ActiveForm::end(); ?>
		</div>
	</div>

</div>

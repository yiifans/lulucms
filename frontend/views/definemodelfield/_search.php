<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\search\DefineModelFieldSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="define-model-field-search">

	<?php $form = ActiveForm::begin([
		'action' => ['index'],
		'method' => 'get',
	]); ?>

		<?= $form->field($model, 'id') ?>

		<?= $form->field($model, 'model_id') ?>

		<?= $form->field($model, 'lable') ?>

		<?= $form->field($model, 'name') ?>

		<?= $form->field($model, 'type') ?>

		<?php // echo $form->field($model, 'length') ?>

		<?php // echo $form->field($model, 'sort_num') ?>

		<?php // echo $form->field($model, 'front_fun_add') ?>

		<?php // echo $form->field($model, 'front_fun_update') ?>

		<?php // echo $form->field($model, 'front_fun_show') ?>

		<?php // echo $form->field($model, 'front_form_type') ?>

		<?php // echo $form->field($model, 'front_form_option') ?>

		<?php // echo $form->field($model, 'front_form_default') ?>

		<?php // echo $form->field($model, 'front_form_html') ?>

		<?php // echo $form->field($model, 'back_fun_add') ?>

		<?php // echo $form->field($model, 'back_fun_update') ?>

		<?php // echo $form->field($model, 'back_fun_show') ?>

		<?php // echo $form->field($model, 'back_form_type') ?>

		<?php // echo $form->field($model, 'back_form_option') ?>

		<?php // echo $form->field($model, 'back_form_default') ?>

		<?php // echo $form->field($model, 'back_form_html') ?>

		<div class="form-group">
			<?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
			<?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>

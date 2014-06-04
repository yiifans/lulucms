<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\DefineModelField $model
 * @var yii\widgets\ActiveForm $form
 */


?>

<div class="define-model-field-form">

	<?php $form = ActiveForm::begin(); ?>

		<?= $form->field($model, 'model_id')->textInput() ?>

		<?= $form->field($model, 'lable')->textInput(['maxlength' => 80]) ?>

		<?= $form->field($model, 'name')->textInput(['maxlength' => 80]) ?>

		<?= $form->field($model, 'type')->textInput(['maxlength' => 80]) ?>

		
		
		<?= $form->field($model, 'length')->textInput() ?>

		<?= $form->field($model, 'sort_num')->textInput() ?>

		<?= $form->field($model, 'front_fun_add')->textInput(['maxlength' => 80]) ?>

		<?= $form->field($model, 'front_fun_update')->textInput(['maxlength' => 80]) ?>

		<?= $form->field($model, 'front_fun_show')->textInput(['maxlength' => 80]) ?>

		<?= $form->field($model, 'front_form_type')->textInput(['maxlength' => 80]) ?>

		<?= $form->field($model, 'front_form_option')->textInput(['maxlength' => 80]) ?>

		<?= $form->field($model, 'front_form_default')->textInput(['maxlength' => 80]) ?>

		<?= $form->field($model, 'front_form_html')->textInput(['maxlength' => 80]) ?>

		<?= $form->field($model, 'back_fun_add')->textInput(['maxlength' => 80]) ?>

		<?= $form->field($model, 'back_fun_update')->textInput(['maxlength' => 80]) ?>

		<?= $form->field($model, 'back_fun_show')->textInput(['maxlength' => 80]) ?>

		<?= $form->field($model, 'back_form_type')->textInput(['maxlength' => 80]) ?>

		<?= $form->field($model, 'back_form_option')->textInput(['maxlength' => 80]) ?>

		<?= $form->field($model, 'back_form_default')->textInput(['maxlength' => 80]) ?>

		<?= $form->field($model, 'back_form_html')->textInput(['maxlength' => 80]) ?>

		<div class="form-group">
			<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>

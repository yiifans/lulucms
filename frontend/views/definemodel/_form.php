<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\DefineModel $model
 * @var yii\widgets\ActiveForm $form
 */

?>

<div class="define-model-form">

	<?php $form = ActiveForm::begin(); ?>

	

		<?= $form->field($model, 'name')->textInput(['maxlength' => 80]) ?>

		<?= $form->field($model, 'sort_num')->textInput() ?>

		<?= $form->field($model, 'is_enable')->checkbox() ?>

		<?= $form->field($model, 'is_nav')->checkbox() ?>

		<?= $form->field($model, 'alias')->textInput(['maxlength' => 80]) ?>

		<?= $form->field($model, 'note')->textInput(['maxlength' => 80]) ?>

		<?= $form->field($model, 'tpl_front_form')->textInput(['maxlength' => 2000]) ?>

		<?= $form->field($model, 'tpl_back_form')->textInput(['maxlength' => 2000]) ?>

		<div class="form-group">
			<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>

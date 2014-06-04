<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\models\TplItem $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="tpl-item-form">

	<?php $form = ActiveForm::begin(); ?>

		<?= $form->field($model, 'category_id')->textInput() ?>

		<?= $form->field($model, 'model_id')->textInput() ?>

		<?= $form->field($model, 'name')->textInput(['maxlength' => 80]) ?>

		<?= $form->field($model, 'file_path')->textInput(['maxlength' => 80]) ?>

		<?= $form->field($model, 'file_name')->textInput(['maxlength' => 80]) ?>

		<?= $form->field($model, 'create_time')->textInput() ?>

		<?= $form->field($model, 'modify_time')->textInput() ?>

		<?= $form->field($model, 'note')->textInput(['maxlength' => 80]) ?>

		<?= $form->field($model, 'file_content')->textInput(['maxlength' => 2000]) ?>

		<div class="form-group">
			<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>

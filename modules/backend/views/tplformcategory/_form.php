<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\models\TplFormCategory $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="tpl-form-category-form">

	<?php $form = ActiveForm::begin(); ?>

		<?= $form->field($model, 'name')->textInput(['maxlength' => 80]) ?>

		<?= $form->field($model, 'note')->textInput(['maxlength' => 80]) ?>

		<div class="form-group">
			<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>

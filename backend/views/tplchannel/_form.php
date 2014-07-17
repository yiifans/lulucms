<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/**
 * @var yii\web\View $this
 * @var common\models\TplConver $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="tpl-channel-form">

	<?php $form = ActiveForm::begin(); ?>

		<?= $form->field($model, 'category_id')->dropDownList($tplCoverCategoryList) ?>

		<?= $form->field($model, 'table_id')->dropDownList(ArrayHelper::map($tableList,'id','name')) ?>

		<?= $form->field($model, 'name')->textInput(['maxlength' => 80]) ?>

		<?= $form->field($model, 'file_path')->textInput(['maxlength' => 80]) ?>

		<?= $form->field($model, 'file_name')->textInput(['maxlength' => 80]) ?>

		<?= $form->field($model, 'file_content')->textarea(['rows' => 12]) ?>

		<?= $form->field($model, 'create_time')->textInput() ?>

		<?= $form->field($model, 'note')->textInput(['maxlength' => 80]) ?>

		<?= $form->field($model, 'modify_time')->textInput() ?>

		<div class="form-group">
			<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>

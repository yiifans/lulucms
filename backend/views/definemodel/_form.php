<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/**
 * @var yii\web\View $this
 * @var app\models\DefineModel $model
 * @var yii\widgets\ActiveForm $form
 */

?>

<div class="define-model-form">

    <?php $form = ActiveForm::begin([
		'fieldConfig' => [
			'options' => ['tag' => 'tr','class' => 'form-group'],
			'template' => '<td class="hAlign_right padding_r10">{label}:</td><td>{input}</td><td>{hint}</td><td>{error}</td>',
    	],
    ]); ?>

	
		<table class="table">
			<?= $form->field($model, 'name')->textInput(['maxlength' => 80]) ?>
	
			<?= $form->field($model, 'sort_num')->textInput() ?>
	
			<?= $form->field($model, 'is_enable')->checkbox() ?>
	
			<?= $form->field($model, 'is_nav')->checkbox() ?>
	
			<?= $form->field($model, 'alias')->textInput(['maxlength' => 80]) ?>
	
			<?= $form->field($model, 'note')->textInput(['maxlength' => 80]) ?>
	
			<?= $form->field($model, 'tpl_front_form')->dropDownList(ArrayHelper::map($frontTplFormList, 'id', 'name','model_name')) ?>
			
			<?= $form->field($model, 'tpl_back_form')->dropDownList(ArrayHelper::map($backTplFormList, 'id', 'name','model_name')) ?>
		</table>
		<div class="form-group">
			<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>

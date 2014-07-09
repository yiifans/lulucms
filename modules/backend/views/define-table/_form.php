<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\DefineTable $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="define-table-form">

    <?php
    	$disabled= $model->isNewRecord? null:'disabled';
    	$form = ActiveForm::begin([
			'fieldConfig' => $this->getDefaultFieldConfig(),
	    ]); ?>
	    
		<table class="table">
		<?= $form->field($model, 'name_en')->textInput(['maxlength' => 80,'disabled'=>$disabled]) ?>

		<?= $form->field($model, 'name')->textInput(['maxlength' => 80]) ?>

		<?= $form->field($model, 'is_default')->checkBox([],false) ?>
		
		<?= $form->field($model, 'description')->textarea(['rows' => 3]) ?>
		
		<?= $form->field($model, 'note')->textarea(['rows' => 3]) ?>
		
		<?php $this->echoButtons($model); ?>
		</table>
	
	<?php ActiveForm::end(); ?>

</div>

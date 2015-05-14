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
		<?= $form->field($model, 'table_name')->textInput(['maxlength' => 80,'disabled'=>$disabled]) ?>

		<?= $form->field($model, 'name')->textInput(['maxlength' => 80]) ?>

		<?= $form->field($model, 'is_default')->checkBox([],false) ?>
		
		<?= $form->field($model, 'note')->textarea(['rows' => 3]) ?>
		
		
		</table>
	<?php $this->echoButtons2($model); ?>
	<?php ActiveForm::end(); ?>

</div>

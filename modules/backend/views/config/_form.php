<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\models\Config $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="config-form">

    <?php
    	$disabled= $model->isNewRecord? null:'disabled';
    	$form = ActiveForm::begin([
			'fieldConfig' => $this->getDefaultFieldConfig(),
	    ]); ?>
<table class="table">
	<?= $form->field($model, 'scope')->textInput(['maxlength' => 64]) ?>
	
    <?= $form->field($model, 'variable')->textInput(['maxlength' => 64]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 64]) ?>

    <?= $form->field($model, 'value')->textInput(['maxlength' => 1024]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => 32]) ?>
    
    <?php $this->echoButtons($model); ?>
    
</table>
   
    <?php ActiveForm::end(); ?>

</div>

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
    <?= $form->field($model, 'site_name')->textInput(['maxlength' => 64]) ?>

    <?= $form->field($model, 'site_url')->textInput(['maxlength' => 64]) ?>

    <?= $form->field($model, 'site_path')->textInput(['maxlength' => 64]) ?>

    <?= $form->field($model, 'site_logo')->textInput(['maxlength' => 32]) ?>
    
    <?= $form->field($model, 'site_admin_email')->textInput(['maxlength' => 64]) ?>
    
    <?= $form->field($model, 'site_icp')->textInput(['maxlength' => 64]) ?>
    
    <?= $form->field($model, 'site_copyright')->textInput(['maxlength' => 64]) ?>
    
    <?= $form->field($model, 'site_stats')->textInput(['maxlength' => 64]) ?>
    
    <?= $form->field($model, 'site_status')->dropDownList(['0'=>'不','1'=>'是']) ?>
    
    <?= $form->field($model, 'site_status_message')->textarea(['rows' => 5]) ?>
    
    <?php $this->echoButtons($model); ?>
</table>
    
    <?php ActiveForm::end(); ?>

</div>

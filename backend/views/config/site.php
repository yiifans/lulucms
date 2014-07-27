<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\models\Config $model
 * @var yii\widgets\ActiveForm $form
 */

$this->title="基本设置";
$this->addBreadcrumb($this->title);

?>

<div class="config-form">

    <?php
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
    
    <?= $form->field($model, 'site_copyright')->textarea(['rows' => 3]) ?>
    
    <?= $form->field($model, 'site_stats')->textarea(['rows' => 3]) ?>
    
    <?= $form->field($model, 'site_status')->dropDownList(['1'=>'开启', '0'=>'关闭']) ?>
    
    <?= $form->field($model, 'site_status_message')->textarea(['rows' => 3]) ?>
    
    
</table>
   <?php $this->echoButtons2($model); ?>
    <?php ActiveForm::end(); ?>

</div>

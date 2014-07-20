<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\models\PageCategory $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="page-category-form">

    <?php
    	$disabled= $model->isNewRecord? null:'disabled';
    	$form = ActiveForm::begin([
			'fieldConfig' => $this->getDefaultFieldConfig(),
	    ]); ?>

    <table class="table">
    <?= $form->field($model, 'name')->textInput(['maxlength' => 64]) ?>

    <?= $form->field($model, 'note')->textarea(['rows' => 3]) ?>
    
    <?= $form->field($model, 'seo_title')->textInput(['maxlength' => 64]) ?>
    
    <?= $form->field($model, 'seo_keywords')->textInput(['maxlength' => 64]) ?>
    
    <?= $form->field($model, 'seo_description')->textarea(['rows' => 3]) ?>
    
    <?= $form->field($model, 'sort_num')->textInput() ?>
    
    <?php $this->echoButtons($model); ?>
    
	</table>
   
    <?php ActiveForm::end(); ?>

</div>

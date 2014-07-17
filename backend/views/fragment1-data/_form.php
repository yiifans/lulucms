<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\models\Fragment1Data $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="fragment1-data-form">

    <?php
    	$disabled= $model->isNewRecord? null:'disabled';
    	$form = ActiveForm::begin([
			'fieldConfig' => $this->getDefaultFieldConfig2(),
	    ]); ?>
	<table class="table">
    <?= $form->field($model, 'title')->textInput(['maxlength' => 128]) ?>
    
    <?= $form->field($model, 'content')->textarea(['rows' => 15]) ?>

    <?= $form->field($model, 'sort_num')->textInput() ?>

    <?php $this->echoButtons($model); ?>
	</table>

    <?php ActiveForm::end(); ?>

</div>

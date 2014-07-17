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
			'fieldConfig' => [
				'options' => ['tag' => 'tr','class' => 'form-group'],
				'template' => '<td class="hAlign_left padding_r10" width="150">{label}:</td><td width="300">{input}</td><td>{hint}</td><td>{error}</td>',
	    	],
	    ]); ?>

    <table class="table">
    <?= $form->field($model, 'name')->textInput(['maxlength' => 64]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 5]) ?>
    
    <?= $form->field($model, 'sort_num')->textInput() ?>
	</table>
    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\models\DictCategory $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="dict-form">

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
	
		<?= $form->field($model, 'cache_key')->textInput(['maxlength' => 64]) ?>
	
	    <!-- 
	    <?= $form->field($model, 'value')->textInput(['maxlength' => 1024]) ?>
	    <?= $form->field($model, 'datatype')->textInput(['maxlength' => 32]) ?>
		 -->
	    <?= $form->field($model, 'sort_num')->textInput() ?>
	
	    <?= $form->field($model, 'is_sys')->checkbox([],false) ?>
		</table>
	    <div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>

    <?php ActiveForm::end(); ?>

</div>


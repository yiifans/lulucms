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
			'fieldConfig' => $this->getDefaultFieldConfig(),
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
	    
	    <?php $this->echoButtons($model); ?>
	    
		</table>
	   
    <?php ActiveForm::end(); ?>

</div>


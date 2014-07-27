<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\models\ContentFlag $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="content-flag-form">

    <?php
    	$disabled= $model->isNewRecord? null:'disabled';
    	$form = ActiveForm::begin([
			'fieldConfig' => $this->getDefaultFieldConfig(),
	    ]); ?>
	<table class="table">
	    <?= $form->field($model, 'id')->textInput(['maxlength' => 64]) ?>
	
	    <?= $form->field($model, 'name')->textInput(['maxlength' => 64]) ?>
	
	    <?= $form->field($model, 'value')->textInput() ?>
	
	    <?= $form->field($model, 'note')->textarea(['rows' => 3]) ?>
	
	</table>
	<?php $this->echoButtons2($model); ?>
    <?php ActiveForm::end(); ?>

</div>

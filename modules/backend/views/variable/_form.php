<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use components\LuLu;
use common\includes\CommonData;

/**
 * @var yii\web\View $this
 * @var common\models\Variable $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="variable-form">

    <?php
    	$disabled= $model->isNewRecord? null:'disabled';
    	$form = ActiveForm::begin([
			'fieldConfig' => $this->getDefaultFieldConfig(),
	    ]); ?>
	    <table class="table">

    <?= $form->field($model, 'id')->textInput(['maxlength' => 64]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 64]) ?>

    <?= $form->field($model, 'value')->textarea(['rows' => 3]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 3]) ?>
    
    <?= $form->field($model, 'is_cache')->checkbox([],false) ?>

    <?= $form->field($model, 'data_type')->dropDownList(CommonData::getDataType()) ?>

	<?= $form->field($model, 'sort_num')->textInput() ?>
	
	<?php $this->echoButtons($model); ?>
	
	</table>
	

    <?php ActiveForm::end(); ?>

</div>

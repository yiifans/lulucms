<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\models\FragmentCategory $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="fragment-category-form">

    <?php
    	$disabled= $model->isNewRecord? null:'disabled';
    	$form = ActiveForm::begin([
			'fieldConfig' => $this->getDefaultFieldConfig(),
	    ]); ?>

    <table class="table">

    <?= $form->field($model, 'name')->textInput(['maxlength' => 80]) ?>

    <?= $form->field($model, 'sort_num')->textInput() ?>

    
	</table>
	<?php $this->echoButtons2($model); ?>
    <?php ActiveForm::end(); ?>

</div>

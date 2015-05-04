<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\models\Fragment3Data $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="fragment3-data-form">

    <?php
    	$disabled= $model->isNewRecord? null:'disabled';
    	$form = ActiveForm::begin([
			'fieldConfig' => $this->getDefaultFieldConfig(),
	    ]); ?>
	<table class="table">

    <?= $form->field($model, 'channel_id')->textInput() ?>

    <?= $form->field($model, 'content_id')->textInput() ?>

    <?= $form->field($model, 'sort_num')->textInput() ?>

    
	</table>
	<?php $this->echoButtons($model); ?>
    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\Content $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="content-form">
    <?php
    	$disabled= $model->isNewRecord? null:'disabled';
    	
    	 $form = ActiveForm::begin([
		'fieldConfig' => [
			'options' => ['tag' => 'tr','class' => 'form-group'],
			'template' => '<td class="hAlign_right padding_r10" width="150px">{label}:</td><td>{input}</td><td>{hint}</td><td>{error}</td>',
    	],
    ]); ?>
	<table class="table">

    <?= $form->field($model, 'channel_id')->hiddenInput(['value'=>$chnid]) ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'user_name')->textInput(['maxlength' => 80]) ?>

    <?= $form->field($model, 'publish_time')->textInput() ?>

    <?= $form->field($model, 'modify_time')->textInput() ?>

    <?= $form->field($model, 'att1')->textInput() ?>

    <?= $form->field($model, 'att2')->textInput() ?>

    <?= $form->field($model, 'att3')->textInput() ?>

    <?= $form->field($model, 'flag')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => 128]) ?>

    <?= $form->field($model, 'source')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'title_format')->textInput(['maxlength' => 128]) ?>

    <?= $form->field($model, 'title_pic')->textInput(['maxlength' => 128]) ?>

    <?= $form->field($model, 'redirect_url')->textInput(['maxlength' => 128]) ?>

    <?= $form->field($model, 'keywords')->textInput(['maxlength' => 128]) ?>

    <?= $form->field($model, 'sub_title')->textInput(['maxlength' => 128]) ?>

    <?= $form->field($model, 'summary')->textInput(['maxlength' => 512]) ?>
	
	</table>
	
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

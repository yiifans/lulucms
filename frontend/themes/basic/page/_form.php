<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/**
 * @var yii\web\View $this
 * @var common\models\Page $model
 * @var yii\widgets\ActiveForm $form
 */

?>

<div class="page-form">

    <?php
    	$disabled= $model->isNewRecord? null:'disabled';
    	$form = ActiveForm::begin([
			'fieldConfig' => [
				'options' => ['tag' => 'tr','class' => 'form-group'],
				'template' => '<td class="hAlign_left padding_r10" width="150">{label}:</td><td width="300">{input}</td><td>{hint}</td><td>{error}</td>',
	    	],
	    ]); ?>

    	<table class="table">

    <?= $form->field($model, 'category_id')->dropDownList($categories) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => 128]) ?>

    <?= $form->field($model, 'title_format')->textInput(['maxlength' => 128]) ?>

    <?= $form->field($model, 'title_pic')->textInput(['maxlength' => 128]) ?>
    
    <?= $form->field($model, 'summary')->textInput(['maxlength' => 512]) ?>
    
    <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'seo_title')->textInput(['maxlength' => 128]) ?>

    <?= $form->field($model, 'seo_keywords')->textInput(['maxlength' => 128]) ?>

    <?= $form->field($model, 'seo_description')->textInput(['maxlength' => 128]) ?>

    <?= $form->field($model, 'tpl')->dropDownList($tpls) ?>
    
    <?= $form->field($model, 'sort_num')->textInput() ?>
    
    <?= $form->field($model, 'status')->dropDownList(['0'=>'草稿','1'=>'发布']) ?>
    
	</table>
	
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

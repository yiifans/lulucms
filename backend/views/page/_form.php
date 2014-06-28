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
			'fieldConfig' => $this->getDefaultFieldConfig(),
	    ]); ?>

    	<table class="table">

    

    <?= $form->field($model, 'title')->textInput(['maxlength' => 128]) ?>

    <?= $form->field($model, 'title_format')->textInput(['maxlength' => 128]) ?>

    <?= $form->field($model, 'title_pic')->textInput(['maxlength' => 128]) ?>
    
    <?= $form->field($model, 'summary')->textInput(['maxlength' => 512]) ?>
    
    <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'seo_title')->textInput(['maxlength' => 128]) ?>

    <?= $form->field($model, 'seo_keywords')->textInput(['maxlength' => 128]) ?>

    <?= $form->field($model, 'seo_description')->textInput(['maxlength' => 128]) ?>

    <?= $form->field($model, 'tpl')->dropDownList($tpls) ?>
    
    <?= $form->field($model, 'category_id')->dropDownList($categories) ?>
    
    <?= $form->field($model, 'sort_num')->textInput() ?>
    
    <?= $form->field($model, 'status')->dropDownList(['0'=>'草稿','1'=>'发布']) ?>
    
    <?php $this->echoButtons($model); ?>
	</table>
	
    <?php ActiveForm::end(); ?>

</div>

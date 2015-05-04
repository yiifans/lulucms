<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use components\widgets\Tabs;

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
			'fieldConfig' => $this->getDefaultFieldConfig(),
	    ]); ?>
    <?php 
	  Tabs::begin([
	      'items' => [
	          ['label' => '基本信息', 'contentId' => 'tableBasic'],
	          ['label' => 'SEO设置', 'contentId' => 'tableSEO'],
	      ],
	  ]);
	?>
	<div id="tableBasic" class="tab-pane active">
    <table class="table">
    <?= $form->field($model, 'name')->textInput(['maxlength' => 64]) ?>

    <?= $form->field($model, 'sort_num')->textInput() ?>
    
    <?= $form->field($model, 'note')->textarea(['rows' => 3]) ?>
    
    </table>
    </div>
    
    <div id="tableSEO" class="tab-pane">
    <table class="table">
    <?= $form->field($model, 'seo_title')->textInput(['maxlength' => 64]) ?>
    
    <?= $form->field($model, 'seo_keywords')->textInput(['maxlength' => 64]) ?>
    
    <?= $form->field($model, 'seo_description')->textarea(['rows' => 3]) ?>
    
    </table>
    </div>
   
   <?php Tabs::end();?>
   <?php $this->echoButtons2($model); ?>
    <?php ActiveForm::end(); ?>

</div>

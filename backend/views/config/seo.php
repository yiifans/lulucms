<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\models\Config $model
 * @var yii\widgets\ActiveForm $form
 */

$this->title="SEO设置";
$this->addBreadcrumb($this->title);

?>

<div class="config-form">

    <?php
    	$form = ActiveForm::begin([
			'fieldConfig' => $this->getDefaultFieldConfig(),
	    ]); ?>
		<table class="table">
		    <?= $form->field($model, 'seo_title')->textInput(['maxlength' => 64]) ?>
		
		    <?= $form->field($model, 'seo_keywords')->textInput(['maxlength' => 64]) ?>
		
		    <?= $form->field($model, 'seo_description')->textarea(['rows' => 3]) ?>
		    
		    
		    
		</table>
 	<?php $this->echoButtons2($model); ?>
    <?php ActiveForm::end(); ?>

</div>

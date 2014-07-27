<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\models\Config $model
 * @var yii\widgets\ActiveForm $form
 */

$this->title="内容设置";
$this->addBreadcrumb($this->title);

?>

<div class="config-form">

    <?php
    	$form = ActiveForm::begin([
			'fieldConfig' => $this->getDefaultFieldConfig(),
	    ]); ?>
	<table class="table">
	    <?= $form->field($model, 'content_att1_label')->textInput(['maxlength' => 64]) ?>
	
	    <?= $form->field($model, 'content_att1_name')->textarea(['rows' => 5]) ?>
	     
	    <?= $form->field($model, 'content_att2_label')->textInput(['maxlength' => 64]) ?>
	
	    <?= $form->field($model, 'content_att2_name')->textarea(['rows' => 5]) ?>
	    
	    <?= $form->field($model, 'content_att3_label')->textInput(['maxlength' => 64]) ?>
	
	    <?= $form->field($model, 'content_att3_name')->textarea(['rows' => 5]) ?>
	    
	</table>
 	<?php $this->echoButtons2($model); ?>
    <?php ActiveForm::end(); ?>

</div>

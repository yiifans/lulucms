<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use components\widgets\KindEditor;

/**
 * @var yii\web\View $this
 * @var common\models\Fragment1Data $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="fragment1-data-form">

    <?php
    	$disabled= $model->isNewRecord? null:'disabled';
    	$form = ActiveForm::begin([
			'fieldConfig' => $this->getDefaultFieldConfig2(),
	    ]); ?>
	<table class="table">
    <?= $form->field($model, 'title')->textInput(['maxlength' => 128]) ?>
    
    <?= $form->field($model, 'content')->textarea(['rows' => 15]) ?>
	<?php KindEditor::widget(['input'=>'#fragment1data-content'])?>
    <?= $form->field($model, 'sort_num')->textInput() ?>

    
	</table>
	<?php $this->echoButtons2($model); ?>
    <?php ActiveForm::end(); ?>

</div>

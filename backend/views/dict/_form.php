<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use components\LuLu;

/**
 * @var yii\web\View $this
 * @var common\models\Dict $model
 * @var yii\widgets\ActiveForm $form
 */

?>

<div class="dict-form">

    <?php
    	$disabled= $model->isNewRecord? null:'disabled';
    	$form = ActiveForm::begin([
			'fieldConfig' => $this->getDefaultFieldConfig(),
	    ]); ?>
	    <table class="table">
	
		<tr class="form-group field-dict-parent_id required">
			<td class="hAlign_left padding_r10">
				<label style="font-weight:normal;" for="dict-parent_id">分类</label>:</td>
			<td><?php echo $category['name'],'(',$category['id'],')'?></td>
			<td><div class="help-block"></div></td>
		</tr>
		
		<tr class="form-group field-dict-parent_id required">
			<td class="hAlign_left padding_r10">
				<label style="font-weight:normal;" for="dict-parent_id">父级</label>:</td>
			<td><?php echo $parent->name?></td>
			<td><div class="help-block"></div></td>
		</tr>
		
	    <?= $form->field($model, 'name')->textInput(['maxlength' => 64]) ?>
	
	    <?= $form->field($model, 'value')->textarea(['rows' => 3]) ?>

	    
	    <?= $form->field($model, 'sort_num')->textInput() ?>
	    
	    
	    
		</table>
	  <?php $this->echoButtons2($model); ?>
    <?php ActiveForm::end(); ?>

</div>

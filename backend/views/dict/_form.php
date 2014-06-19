<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/**
 * @var yii\web\View $this
 * @var common\models\Dict $model
 * @var yii\widgets\ActiveForm $form
 */
$dataTypeArray=[
	'string'=>'字符串',
	'bool'=>'boolean',
	'array'=>'数组',
	'int'=>'整数',
	'date'=>'时间',
];
?>

<div class="dict-form">

    <?php
    	$disabled= $model->isNewRecord? null:'disabled';
    	$form = ActiveForm::begin([
			'fieldConfig' => [
				'options' => ['tag' => 'tr','class' => 'form-group'],
				'template' => '<td class="hAlign_left padding_r10" width="150">{label}:</td><td width="300">{input}</td><td>{hint}</td><td>{error}</td>',
	    	],
	    ]); ?>
	    <table class="table">
	
		<tr class="form-group field-dict-parent_id required">
		<td class="hAlign_left padding_r10" width="150"><label class="control-label" for="dict-parent_id">缓存Key</label>:</td>
		<td width="300"><?php echo $parent->cache_key?></td>
		<td></td>
		<td><div class="help-block"></div></td>
		</tr>
		
		<tr class="form-group field-dict-parent_id required">
		<td class="hAlign_left padding_r10" width="150"><label class="control-label" for="dict-parent_id">父级</label>:</td>
		<td width="300"><?php echo $parent->name?></td>
		<td></td>
		<td><div class="help-block"></div></td>
		</tr>
		
	    <?= $form->field($model, 'name')->textInput(['maxlength' => 64]) ?>
	
	    <?= $form->field($model, 'value')->textarea(['rows' => 5]) ?>
	
	    <?= $form->field($model, 'datatype')->dropDownList($dataTypeArray) ?>
	    
	    <?= $form->field($model, 'sort_num')->textInput() ?>
		</table>
	    <div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use components\widgets\Tabs;

/**
 * @var yii\web\View $this
 * @var app\models\DefineTableField $model
 * @var yii\widgets\ActiveForm $form
 */


$fieldTypeArray=[
			
			'varchar'=>'字符型0-255字节(varchar)',
			'char'=>'定长字符型0-255字节(char)',
			'text'=>'小型字符型(text)',
			'mediumtext'=>'中型字符型(mediumtext)',
			'longtext'=>'大型字符型(longtext)',
			'tinyint'=>'小数值型(tinyint)',
			'smallint'=>'中数值型(smallint)',
			'int'=>'大数值型(int)',
			'bigint'=>'超大数值型(bigint)',
			'float'=>'数值浮点型(float)',
			'double'=>'数值双精度型(double)',
			'date'=>'日期型(date)',
			'datetime'=>'日期时间型(datetime)',
			
		];
$formTypeArray=[
	'text'=>'单行文本框(text)',
	'password'=>'密码框(password)',
	'select'=>'下拉框(select)',
	'radio'=>'单选框(radio)',
	'checkbox'=>'复选框(checkbox)',
	'textarea'=>'多行文本框(textarea)',
	'file'=>'文件(file)',
	'editor'=>'编辑器(editor)',
	'img'=>'图片(img)',
	'flash'=>'FLASH文件(flash)',
	'date'=>'日期(date)',
	'color'=>'颜色(color)',
	'morevaluefield'=>'多值字段(morevaluefield)',
	'linkfield'=>'选择外表关联字段(linkfield)',
	'linkfieldselect'=>'下拉外表关联字段(linkfieldselect)',
	
];

?>

<div class="define-table-field-form">

    <?php
    	$disabled= $model->isNewRecord? null:'disabled';
    	
    	 $form = ActiveForm::begin([
		'fieldConfig' => $this->getDefaultFieldConfig(),
    ]); ?>
    
    <?php 
	  Tabs::begin([
	      'items' => [
	          ['label' => '基本信息', 'contentId' => 'tableBasic'],
	          ['label' => '前台表单', 'contentId' => 'tableFrontForm'],
	          ['label' => '后台表单', 'contentId' => 'tableBackForm'],
	      ],
	  ]);
	?>
	<div id="tableBasic" class="tab-pane active">
	
		<table class="table">
		
		<?= $form->field($model, 'field_name')->textInput(['maxlength' => 80,'disabled'=>$disabled]) ?>

		<?= $form->field($model, 'name')->textInput(['maxlength' => 80]) ?>

		<?= $form->field($model, 'type')->dropDownList($fieldTypeArray,['disabled'=>$disabled]) ?>
		
		<?= $form->field($model, 'length')->textInput(['disabled'=>$disabled]) ?>
		
		<?= $form->field($model, 'is_null')->checkBox(['disabled'=>$disabled],false) ?>
		
		<?= $form->field($model, 'is_index')->checkBox(['disabled'=>$disabled],false) ?>
		
		<?= $form->field($model, 'is_unique')->checkBox(['disabled'=>$disabled],false) ?>
		
		<?= $form->field($model, 'is_main')->checkBox([],false) ?>
		<!-- 
		<?= $form->field($model, 'is_sys')->checkBox([],false) ?>
		 -->
		<?= $form->field($model, 'sort_num')->textInput() ?>

		<?= $form->field($model, 'note')->textarea(['rows' => 3]) ?>
		
		</table>
		</div>
		
		<div id="tableFrontForm" class="tab-pane">
		<table  class="table">
		
    	<?= $form->field($model, 'front_status')->checkBox([],false) ?>

    	<tr class="form-group field-definetablefield-sort_num">
			<td class="hAlign_left padding_r10" width="120px">
				<label style="font-weight:normal;" for="definetablefield-sort_num">必填项</label>:</td>
			<td width="600"><input type="text" id="definetablefield-sort_num" class="form-control" value="1"></td>
			<td><div class="help-block"></div>
		</td>
    	<tr class="form-group field-definetablefield-sort_num">
			<td class="hAlign_left padding_r10" width="120px">
				<label style="font-weight:normal;" for="definetablefield-sort_num">可修改</label>:</td>
			<td width="600"><input type="text" id="definetablefield-sort_num" class="form-control" value="1"></td>
			<td><div class="help-block"></div>
		</td>
	    <?= $form->field($model, 'front_fun_add')->textInput(['maxlength' => 64]) ?>
	
	    <?= $form->field($model, 'front_fun_update')->textInput(['maxlength' => 64]) ?>
	
	    <?= $form->field($model, 'front_fun_show')->textInput(['maxlength' => 64]) ?>
	
		<?= $form->field($model, 'front_form_type')->dropDownList($formTypeArray) ?>
	
	    <?= $form->field($model, 'front_form_option')->textarea(['rows' => 3]) ?>
	
	    <?= $form->field($model, 'front_form_default')->textInput(['maxlength' => 128]) ?>
	    
	    <?= $form->field($model, 'front_form_source')->textarea(['rows' => 3]) ?>
		<!-- 
	    <?= $form->field($model, 'front_form_html')->textarea(['rows' => 3]) ?>
		-->
		
	    <?= $form->field($model, 'front_note')->textarea(['rows' => 3]) ?>
	     
	     
	     </table>
	     </div>
	     
	    <div id="tableBackForm" class="tab-pane">
	    <table  class="table ">
		
		<?= $form->field($model, 'back_status')->checkBox([],false) ?>
		
	    <?= $form->field($model, 'back_fun_add')->textInput(['maxlength' => 64]) ?>
	
	    <?= $form->field($model, 'back_fun_update')->textInput(['maxlength' => 64]) ?>
	
	    <?= $form->field($model, 'back_fun_show')->textInput(['maxlength' => 64]) ?>
	
		<?= $form->field($model, 'back_form_type')->dropDownList($formTypeArray) ?>

	    <?= $form->field($model, 'back_form_option')->textarea(['rows' => 3]) ?>
	
	    <?= $form->field($model, 'back_form_default')->textInput(['maxlength' => 128]) ?>
	    
	    <?= $form->field($model, 'back_form_source')->textarea(['rows' => 3]) ?>
		<!-- 
	    <?= $form->field($model, 'back_form_html')->textarea(['rows' => 3]) ?>
		-->
		
	    <?= $form->field($model, 'back_note')->textarea(['rows' => 3]) ?>
    	
    	
		</table>
		</div>
		
<?php Tabs::end();?>

<?php $this->echoButtons2($model); ?>

	<?php ActiveForm::end(); ?>

</div>

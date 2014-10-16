<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use components\widgets\Tabs;

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
			'id'=>'Content',
			'fieldConfig' => $this->getDefaultFieldConfig2(),
			'options'=>[
				'enctype'=>'multipart/form-data',
			],
	    ]); ?>
    <?php 
    
	  Tabs::begin([
	      'items' => [
	          ['label' => '基本信息', 'contentId' => 'tableBasic'],
	          ['label' => '选项', 'contentId' => 'tableOption'],
	      ],
	  ]);
	?>
		<div id="tableBasic" class="tab-pane active">
			<table class="table">
				 <?php echo $this->render('//content/_include/_base', [
						'model' => $model,
						'chnid'=>$chnid,
						'currentChannel' => $currentChannel,
						'fields' => $fields,
				    	'form'=> $form]);
					?>
				
				<?php foreach ($fields as $field ):?>
				<tr class="form-group field-content-<?= $field['field_name'] ?>">
					<td class="hAlign_right padding_r10"><label
						style="font-weight: normal;" for="content-<?= $field['field_name'] ?>"><?= $field['name'] ?></label>:</td>
					<td>
					<?php
						$formType = empty($field['back_form_type']) ? 'default' : $field['back_form_type'];
						echo $this->render('//content/_include/_forms/_' . $formType, ['model' => $model, 'value' => $model->$field['field_name'], 'field' => $field]);
					?>
					</td>
					<td><div class="help-block"></div></td>
				</tr>
				<?php endforeach;?>
				
				
			</table>	
		</div>
		<div id="tableOption" class="tab-pane">
		    <table class="table">
				 <?php echo $this->render('//content/_include/_option', [
						'model' => $model,
						'chnid'=>$chnid,
						'currentChannel' => $currentChannel,
						'fields' => $fields,
				    	'form'=> $form]);
					?>
		    </table>
	    </div>
    	 

	    <?php Tabs::end();?>
	<?php $this->echoButtons2($model); ?>
    <?php ActiveForm::end(); ?>

</div>

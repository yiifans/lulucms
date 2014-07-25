<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\Catalog $model
 */

$this->title = '修改内容';
$this->addBreadcrumb('内容管理('.$currentChannel['name'].')',['index','chnid'=>$chnid]);
$this->addBreadcrumb($this->title);

?>
<div class="content-create">

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
		 
		<table class="table">
			 <?php echo $this->render('//content/_include/_base', [
					'model' => $model,
					'chnid'=>$chnid,
					'currentChannel' => $currentChannel,
					'fields' => $fields,
			    	'form' => $form,
				]); ?>
			
			<?php foreach ($fields as $field ):?>
			<tr class="form-group field-content-<?= $field['name_en'] ?>">
				<td class="hAlign_right padding_r10">
					<label style="font-weight:normal;" for="content-<?= $field['name_en'] ?>"><?= $field['name'] ?></label>:</td>
				<td>
					<?php
						$formType = empty($field['back_form_type'])?'default':$field['back_form_type'];
					 	echo $this->render('//content/_include/_forms/_'.$formType, ['model'=>$model, 'value'=>$model->$field['name_en'], 'field' => $field,]); 
					 ?>
				</td>
				<td><div class="help-block"></div></td>
			</tr>
			<?php endforeach;?>
			<?php $this->echoButtons($model); ?>
		</table>

	    <?php ActiveForm::end(); ?>
	
	</div>

</div>

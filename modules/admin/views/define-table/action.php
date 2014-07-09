<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\DefineTable $model
 */

$this->title = '修改Action';
$this->addBreadcrumb('内容模型('.$model->name.')',['index']);
$this->addBreadcrumb($this->title);

// $this->params['breadcrumbs'][] = ['label' => '表管理', 'url' => ['index']];
// $this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'tb' => $model->name_en]];
// $this->params['breadcrumbs'][] = 'Update';
?>
<div class="define-table-action">

	<div class="define-table-form">

	    <?php $form = ActiveForm::begin([
			'fieldConfig' => $this->getDefaultFieldConfig(),
	    ]); ?>
			<table class="table">
			   <?= $form->field($model, 'name_en')->textInput(['maxlength' => 80,'disabled'=>'disabled']) ?>
			
				<tr>
					<td colspan="4">后台Action设置</td>
				</tr>
		
			    <?= $form->field($model, 'back_action_index')->checkbox([],false) ?>
			
			    <?= $form->field($model, 'back_action_create')->checkbox([],false) ?>
			
			    <?= $form->field($model, 'back_action_update')->checkbox([],false) ?>
			
			    <?= $form->field($model, 'back_action_delete')->checkbox([],false) ?>
			
			    <?= $form->field($model, 'back_action_other')->checkbox([],false) ?>
			    
			    <?= $form->field($model, 'back_action_custom')->textarea(['rows'=>5]) ?>
			    
				<tr>
					<td colspan="4">前台Action设置</td>
				</tr>
			
			    <?= $form->field($model, 'front_action_channel')->checkbox([],false) ?>
			    
			    <?= $form->field($model, 'front_action_list')->checkbox([],false) ?>
			    
			    <?= $form->field($model, 'front_action_detail')->checkbox([],false) ?>
			    
			    <?= $form->field($model, 'front_action_search')->checkbox([],false) ?>
			    
			    <?= $form->field($model, 'front_action_index')->checkbox([],false) ?>
			
			    <?= $form->field($model, 'front_action_create')->checkbox([],false) ?>
			
			    <?= $form->field($model, 'front_action_update')->checkbox([],false) ?>
			
			    <?= $form->field($model, 'front_action_delete')->checkbox([],false) ?>
			
			    <?= $form->field($model, 'front_action_other')->checkbox([],false) ?>
			    
    			<?= $form->field($model, 'front_action_custom')->textarea(['rows'=>5]) ?>
    			
    			<?php $this->echoButtons($model); ?>
    			
			</table>
			
	
		<?php ActiveForm::end(); ?>
	
	</div>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\DefineTable $model
 */

$this->title = '修改Action: ' . $model->name;
$this->addBreadcrumb('内容模型',['index']);
$this->addBreadcrumb($this->title);

// $this->params['breadcrumbs'][] = ['label' => '表管理', 'url' => ['index']];
// $this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'tb' => $model->name_en]];
// $this->params['breadcrumbs'][] = 'Update';
?>
<div class="define-table-update">

	<div class="define-table-form">

	    <?php $form = ActiveForm::begin([
			'fieldConfig' => [
				'options' => ['tag' => 'tr','class' => 'form-group'],
				'template' => '<td class="hAlign_left padding_r10" width="200">{label}:</td><td width="300">{input}</td><td>{hint}</td><td>{error}</td>',
	    	],
	    ]); ?>
			<table class="table">
			   <?= $form->field($model, 'name_en')->textInput(['maxlength' => 80,'disabled'=>'disabled']) ?>
			   
			
				<tr>
					<td colspan="4">后台Action设置</td>
				</tr>
		
			    <?= $form->field($model, 'back_action_manager')->textInput(['maxlength' => 64]) ?>
			
			    <?= $form->field($model, 'back_action_create')->textInput(['maxlength' => 64]) ?>
			
			    <?= $form->field($model, 'back_action_update')->textInput(['maxlength' => 64]) ?>
			
			    <?= $form->field($model, 'back_action_delete')->textInput(['maxlength' => 64]) ?>
			
			    <?= $form->field($model, 'back_action_other')->textInput(['maxlength' => 64]) ?>
			    
			    <?= $form->field($model, 'back_action_custom')->textarea(['rows'=>5]) ?>
			    
				<tr>
					<td colspan="4">前台Action设置</td>
				</tr>
			
			    <?= $form->field($model, 'front_action_channel')->textInput(['maxlength' => 64]) ?>
			    
			    <?= $form->field($model, 'front_action_list')->textInput(['maxlength' => 64]) ?>
			    
			    <?= $form->field($model, 'front_action_detail')->textInput(['maxlength' => 64]) ?>
			    
			    <?= $form->field($model, 'front_action_search')->textInput(['maxlength' => 64]) ?>
			    
			    <?= $form->field($model, 'front_action_manager')->textInput(['maxlength' => 64]) ?>
			
			    <?= $form->field($model, 'front_action_create')->textInput(['maxlength' => 64]) ?>
			
			    <?= $form->field($model, 'front_action_update')->textInput(['maxlength' => 64]) ?>
			
			    <?= $form->field($model, 'front_action_delete')->textInput(['maxlength' => 64]) ?>
			
			    <?= $form->field($model, 'front_action_other')->textInput(['maxlength' => 64]) ?>
			    
    			<?= $form->field($model, 'front_action_custom')->textarea(['rows'=>5]) ?>
			</table>
			<div class="form-group">
				<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
			</div>
	
		<?php ActiveForm::end(); ?>
	
	</div>

</div>

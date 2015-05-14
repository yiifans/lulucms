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

?>
<div class="define-table-action">

	<div class="define-table-form">

	    <?php $form = ActiveForm::begin([
				'fieldConfig' => $this->getDefaultFieldConfig(),
	    ]); ?>
			<table class="table">
			   <?= $form->field($model, 'table_name')->textInput(['maxlength' => 80,'disabled'=>'disabled']) ?>
			
			    <?= $form->field($model, 'back_action_custom')->textarea(['rows'=>3]) ?>
			    
    			<?= $form->field($model, 'front_action_custom')->textarea(['rows'=>3]) ?>
    			
			</table>
			
			<?php $this->echoButtons2($model); ?>
		<?php ActiveForm::end(); ?>
	
	</div>

</div>

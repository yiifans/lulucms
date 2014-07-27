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
			   <?= $form->field($model, 'id')->textInput(['maxlength' => 80,'disabled'=>'disabled']) ?>
			
				<tr>
					<td colspan="3"><label>后台Action设置</label></td>
				</tr>
		
				<tr class="form-group">
					<td class="hAlign_left padding_r10" width="120">模型Action:</td>
					<td width="500">
						<label class="checkbox-inline"><?php echo Html::activeCheckbox($model, 'back_action_index')?>管理</label>
						<label class="checkbox-inline"><?php echo Html::activeCheckbox($model, 'back_action_create')?>添加</label>
						<label class="checkbox-inline"><?php echo Html::activeCheckbox($model, 'back_action_update')?>修改</label>
						<label class="checkbox-inline"><?php echo Html::activeCheckbox($model, 'back_action_delete')?>删除</label>
						<label class="checkbox-inline"><?php echo Html::activeCheckbox($model, 'back_action_other')?>其它</label>
					</td>
					<td><div class="help-block"></div></td>
				</tr>
			    
			    <?= $form->field($model, 'back_action_custom')->textarea(['rows'=>3]) ?>
			    
				<tr>
					<td colspan="3"><label>前台Action设置</label></td>
				</tr>
			    <tr class="form-group">
					<td class="hAlign_left padding_r10" width="120">模型Action:</td>
					<td width="500">
						<label class="checkbox-inline"><?php echo Html::activeCheckbox($model, 'front_action_channel')?>频道</label>
						<label class="checkbox-inline"><?php echo Html::activeCheckbox($model, 'front_action_list')?>列表</label>
						<label class="checkbox-inline"><?php echo Html::activeCheckbox($model, 'front_action_detail')?>内容</label>
						<label class="checkbox-inline"><?php echo Html::activeCheckbox($model, 'front_action_search')?>搜索</label>
						<br>
						<label class="checkbox-inline"><?php echo Html::activeCheckbox($model, 'front_action_index')?>管理</label>
						<label class="checkbox-inline"><?php echo Html::activeCheckbox($model, 'front_action_create')?>添加</label>
						<label class="checkbox-inline"><?php echo Html::activeCheckbox($model, 'front_action_update')?>修改</label>
						<label class="checkbox-inline"><?php echo Html::activeCheckbox($model, 'front_action_delete')?>删除</label>
						<label class="checkbox-inline"><?php echo Html::activeCheckbox($model, 'front_action_other')?>其它</label>
					</td>
					<td><div class="help-block"></div></td>
				</tr>
				
    			<?= $form->field($model, 'front_action_custom')->textarea(['rows'=>3]) ?>
    			
    			
    			
			</table>
			
			<?php $this->echoButtons2($model); ?>
		<?php ActiveForm::end(); ?>
	
	</div>

</div>

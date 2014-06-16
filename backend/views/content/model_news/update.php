<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\Catalog $model
 */

$this->title = 'Create Content';
$this->params['breadcrumbs'][] = ['label' => $currentChannel->name, 'url' => ['index&chnid='.$currentChannel->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="catalog-create">


点击链接加入群【Yii2.0、PHP学习交流群】：http://jq.qq.com/?_wv=1027&k=JWKgZY

	<div class="content-form">
	    <?php
	    	$disabled= $model->isNewRecord? null:'disabled';
	    	
	    	$form = ActiveForm::begin([
				'id'=>'Content',
				'fieldConfig' => [
					'options' => ['tag' => 'tr','class' => 'form-group'],
					'template' => '<td class="hAlign_right padding_r10" width="150px">{label}:</td><td>{input}</td><td>{hint}</td><td>{error}</td>',
		    	],
		    ]); ?>
		 
		<table class="table">
			
			 <?php echo $this->render('//content/_include/_form_common', [
					'model' => $model,
					'chnid'=>$chnid,
					'currentChannel' => $currentChannel,
					'fields' => $fields,
			    	'form' => $form,
				]); ?>
			
			<?php foreach ($fields as $field ):?>
			<tr class="form-group field-content-<?= $field['name_en'] ?>">
				<td class="hAlign_right padding_r10" width="150px">
					<label class="control-label" for="content-<?= $field['name_en'] ?>"><?= $field['name'] ?></label>:</td>
				<td>
					<?php
						$formType = empty($field['back_form_type'])?'default':$field['back_form_type'];
						echo '('.$formType.')';
					 	echo $this->render('//content/_include/_formtype/_'.$formType, ['model'=>$model, 'value'=>$model->$field['name_en'], 'field' => $field,]); 
					 ?>
				</td>
				<td></td>
				<td><div class="help-block"></div></td>
			</tr>
			<?php endforeach;?>
		</table>
		
	    <div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	
	    <?php ActiveForm::end(); ?>
	
	</div>

</div>

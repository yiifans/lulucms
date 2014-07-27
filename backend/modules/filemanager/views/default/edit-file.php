<?php
use yii\helpers\Html;
use components\widgets\ActiveForm;

$this->params['breadcrumbs'][] = ['label' => '返回上级', 'url' => ['index', 'currentdir' => $model->currentDir], ['target' => 'mainFrame']];
?>

<div class="filemanager-default-index">
	
	<?php $form = ActiveForm::begin([
		'fieldConfig'=>[
			'options' => ['tag' => 'tr','class' => 'form-group'],
			'template' => '<td class="hAlign_left padding_r10" width="120">{label}:</td><td width="750">{input}</td><td>{hint}{error}</td>',
			'labelOptions'=>['style'=>'font-weight:normal;']]]);
	?>
	<table class="table">
		<?= $form->field($model, 'name')->textInput(['maxlength' => 64])?>
		<?= $form->field($model, 'currentDir')->textInput(['maxlength' => 64,'readonly'=>'true'])?>
		<?= $form->field($model, 'content')->textarea(['rows' => 20])?>
		<tr class="form-group">
			<td class="hAlign_left padding_r10">&nbsp;</td>
			<td>
				<?php echo Html::submitButton('保存', ['class' => 'btn btn-primary']);?>
			</td>
			<td></td>
		</tr>
	</table>
    <?php ActiveForm::end();?>
</div>

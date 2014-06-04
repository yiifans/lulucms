<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/**
 * @var yii\web\View $this
 * @var app\models\Catalog $model
 * @var yii\widgets\ActiveForm $form
 */
function getPrefix($count)
{
	$ret='';
	for($i=0;$i<$count;$i++)
	{
		$ret.='&nbsp;&nbsp;&nbsp;&nbsp;';
	}
	return $ret;
}

// $parents=[
// 	'0' =>'root',
// ];
// foreach ($catalogTree as $row)
// {
// 	$parents[$row['id']]=getPrefix($row['level']).$row['name_alias'];
// 	//array_push($parents, $var)
// }
$options='<option value="0">root</option>';
foreach ($channelTree as $row)
{
	$selected='';
	if($model->parent_id==intval($row['id']))
	{
		$selected=' selected';
	}
	$style='';
	if($row['is_leaf'])
	{
		$style=' style="color:red;"';
	}
	
	$options.='<option value="'.$row['id'].'"'.$selected.$style.'>'.getPrefix($row['level']).$row['name_alias'].'</option>';
}
?>

<div class="channel-form">

	<?php $form = ActiveForm::begin(); ?>

		<div class="form-group field-channel-parent_id required">
			<label class="control-label" for="channel-parent_id">Parent ID</label>
			<?php echo $model->parent_id?>
			<select id="channel-parent_id" class="form-control" name="Channel[parent_id]">
			<?php echo $options ?>
			</select>
		</div>

		
		
		<?= $form->field($model, 'name')->textInput(['maxlength' => 120]) ?>

		<?= $form->field($model, 'name_alias')->textInput(['maxlength' => 120]) ?>

		<?= $form->field($model, 'name_url')->textInput(['maxlength' => 120]) ?>
		
		<?= $form->field($model, 'redirect_url')->textInput(['maxlength' => 80]) ?>
		
		<?= $form->field($model, 'is_leaf')->checkbox() ?>
		
		<?= $form->field($model, 'table_id')->dropDownList(ArrayHelper::map($tableList,'id','name')) ?>
		
		<?= $form->field($model, 'tpl_channel')->dropDownList(ArrayHelper::map($tplChannelList,'id','name','table_name')) ?>

		<?= $form->field($model, 'tpl_list')->dropDownList(ArrayHelper::map($tplListList,'id','name','table_name')) ?>
		
		<?= $form->field($model, 'tpl_view')->dropDownList(ArrayHelper::map($tplViewList,'id','name','table_name')) ?>

		<?= $form->field($model, 'page_size')->textInput() ?>
		
		<?= $form->field($model, 'is_nav')->checkbox() ?>

		<?= $form->field($model, 'sort_num')->textInput() ?>
		
		<?= $form->field($model, 'note')->textInput(['maxlength' => 80]) ?>

		<?= $form->field($model, 'note2')->textInput(['maxlength' => 80]) ?>

		<div class="form-group">
			<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>

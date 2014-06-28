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
foreach ($this->channelArrayTree as $row)
{
	$selected='';
	if($model->parent_id==intval($row['id']))
	{
		$selected=' selected';
	}
	$style='';
	if($row['is_leaf'])
	{
		$style=' disabled="disabled" style="color:red;"';
	}
	
	$options.='<option value="'.$row['id'].'"'.$selected.$style.'>'.getPrefix($row['level']).$row['name_alias'].'</option>';
}
?>

<div class="channel-form">

    <?php
    	$isLeafEnable=$model['is_leaf']?'disabled':null;
    	$disabled= $model->isNewRecord? null:'disabled';
    	$form = ActiveForm::begin([
			'fieldConfig' => $this->getDefaultFieldConfig(),
	    ]); ?>
		<table class="table">

		<tr class="form-group field-channel-parent_id required">
			<td class="hAlign_right padding_r10">
				<label class="control-label" for="channel-parent_id">父级：</label>
			</td>
			<td>
				<select id="channel-parent_id" class="form-control" name="Channel[parent_id]">
				<?php echo $options ?>
				</select>
			</td>
			<td>&nbsp;&nbsp;</td>
		</tr>
		
		<?= $form->field($model, 'name')->textInput(['maxlength' => 120])->hint('xxx') ?>

		<?= $form->field($model, 'name_alias')->textInput(['maxlength' => 120]) ?>

		<?= $form->field($model, 'name_url')->textInput(['maxlength' => 120]) ?>
		
		<?= $form->field($model, 'redirect_url')->textInput(['maxlength' => 80]) ?>
		
		<?= $form->field($model, 'is_leaf')->checkbox(['readonly'=>$model['is_leaf']],false) ?>
		
		<?= $form->field($model, 'table')->dropDownList(ArrayHelper::map($tableList,'name_en','name')) ?>
		
		<?= $form->field($model, 'channel_tpl')->dropDownList(ArrayHelper::map($channelTpls,'name','name','table')) ?>

		<?= $form->field($model, 'list_tpl')->dropDownList(ArrayHelper::map($listTpls,'name','name','table')) ?>
		
		<?= $form->field($model, 'detail_tpl')->dropDownList(ArrayHelper::map($detailTpls,'name','name','table')) ?>

		<?= $form->field($model, 'page_size')->textInput() ?>
		
		<?= $form->field($model, 'is_nav')->checkbox([],false) ?>

		<?= $form->field($model, 'sort_num')->textInput() ?>
		
		<?= $form->field($model, 'note')->textInput(['maxlength' => 80]) ?>

		<?= $form->field($model, 'note2')->textInput(['maxlength' => 80]) ?>
		
		<?php $this->echoButtons($model); ?>
		
		</table>
		
	<?php ActiveForm::end(); ?>

</div>

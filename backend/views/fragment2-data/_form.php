<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\includes\CommonUtility;

/**
 * @var yii\web\View $this
 * @var common\models\Fragment2Data $model
 * @var yii\widgets\ActiveForm $form
 */

$this->registerJsFile('static/common/js/common.js');

$formatArray=CommonUtility::getTitleFormat();
$formatValueArray = CommonUtility::getTitleFormatArray($model);
?>

<div class="fragment2-data-form">

    <?php
    	$disabled= $model->isNewRecord? null:'disabled';
    	$form = ActiveForm::begin([
			'fieldConfig' => $this->getDefaultFieldConfig2(),
			'options'=>[
				'enctype'=>'multipart/form-data',
			],
	    ]); ?>
	<table class="table">

    <?= $form->field($model, 'title')->textInput(['maxlength' => 120]) ?>

      <tr class="form-group field-fragment2data-title_format">
		<td class="hAlign_right padding_r10">
			<label style="font-weight:normal;" for="fragment2data-title_format">标题格式</label>:</td>
		<td>
			<?php 
				foreach ($formatArray as $value=>$label)
				{
					$checked='';
					foreach ($formatValueArray as $index=>$tempValue)
					{
						if($value==$tempValue)
						{
							$checked=' checked';
							unset($formatValueArray[$index]);
							break;
						}
					}
			?>
				<label class="checkbox-inline"><input type="checkbox" name="Fragment2Data[title_format][]" id="fragment2data-title_format_<?= $value ?>" 
						value="<?= $value ?>" <?php echo $checked?>><?= $label ?></label>
			<?php }?>
			
			<input name="Fragment2Data[title_format][]" id="fragment2data-title_format_c" class="form-control" 
				style="display: inline-block;width:80px;margin-left:10px;" value="<?php echo end($formatValueArray);?>"/>
			<label style="font-weight:normal;" for="fragment2data_title_format_c">颜色</label>
		</td>
		<td><div class="help-block"></div></td>
	</tr>

    <?= $form->field($model, 'url')->textInput(['maxlength' => 120]) ?>

    <?= $form->field($model, 'sub_title')->textInput(['maxlength' => 120]) ?>

    <tr class="form-group field-fragment2data-title_pic">
		<td class="hAlign_right padding_r10"><label style="font-weight:normal;" for="content-title_pic">标题图片</label>:</td>
		<td>
			<div class="file-box">
			<input type="text" id="fragment2data-title_pic" class="form-control" style="display: inline-block; width:500px; " 
				name="Fragment2Data[title_pic]" value="<?php echo $model['title_pic']?>" maxlength="128">
			<input type='button' class='form-control' style="display: inline-block;width:60px;" value='浏览...' /> 
			<input type="file" name="Fragment2Data[title_pic]" class="form-control file" 
				onchange="document.getElementById('fragment2data-title_pic').value=getPath(this);" /> 
			</div>
		</td>
		<td><div class="help-block"></div></td>
	</tr>

    <?= $form->field($model, 'summary')->textarea(['rows' => 5]) ?>

    <?= $form->field($model, 'publish_time')->textInput() ?>

    <?= $form->field($model, 'sort_num')->textInput() ?>
    
    
	</table>
	<?php $this->echoButtons2($model); ?>
    <?php ActiveForm::end(); ?>

</div>

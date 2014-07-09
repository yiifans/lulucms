<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;
use common\models\config\Config;
use common\includes\ContentUtility;

/**
 * @var yii\web\View $this
 * @var app\models\Content $model
 * @var yii\widgets\ActiveForm $form
 */



$formatArray=ContentUtility::$format;
$formatValueArray = ContentUtility::getArrayFormat($model);

$contentFlags=ContentUtility::getFlags();

$att1Lable=Config::getValue('content_att1_label','属性1');
$att1Array=Config::getContentAtt('content_att1_name');

$att2Lable=Config::getValue('content_att2_label','属性2');
$att2Array=Config::getContentAtt('content_att2_name');

$att3Lable=Config::getValue('content_att3_label','属性3');
$att3Array=Config::getContentAtt('content_att3_name');

?>
    <input type="hidden" id="content-channel_id" class="form-control" name="Content[channel_id]" value="<?= $chnid ?>">
  
    <?= $form->field($model, 'title')->textInput(['maxlength' => 128]) ?>
  
  	<tr class="form-group field-content-title_format">
		<td class="hAlign_right padding_r10" width="150px">
			<label class="control-label" for="content-title_format">标题格式</label>:</td>
		<td>
			<?php 
				foreach ($formatArray as $value=>$label)
				{
					$checked='';
					if(in_array($value,$formatValueArray))
					{
						$checked=' checked';
						unset($formatValueArray[$value]);
					}
			?>
				<label><input type="checkbox" name="Content[title_format][]" id="content-title_format_<?= $value ?>" value="<?= $value ?>" <?php echo $checked?>><?= $label ?></label>
			<?php }?>
			<input name="Content[title_format][]" id="content-title_format_c" style="width:40px;" value="<?php echo end($formatValueArray);?>"/>
			<label for="content_title_format_c" class="lb">颜色</label>
			<?php echo $model->title_format?>
		</td>
		<td><div class="help-block"></div></td>
	</tr>
	
	<tr class="form-group field-content-title_att">
		<td class="hAlign_right padding_r10" width="150px">
			<label class="control-label" for="content-title_pic">自定义属性</label>:
		</td>
		<td>
			<label class="control-label" for="content-att1"><?php echo $att1Lable?></label>:
			<?= Html::dropDownList('Content[att1]',$model->att1,$att1Array) ?>
			
			<label class="control-label" for="content-att2"><?php echo $att2Lable?></label>:
			<?= Html::dropDownList('Content[att2]',$model->att2,$att2Array) ?>
			
			<label class="control-label" for="commoncontent-att3"><?php echo $att3Lable?></label>:
			<?= Html::dropDownList('Content[att3]',$model->att3,$att3Array) ?>
		</td>
		<td><div class="help-block"></div></td>
	</tr>

	<tr class="form-group field-content-flag">
		<td class="hAlign_right padding_r10" width="150px">
			<label class="control-label" for="content-flag">聚合标签</label>:</td>
		<td>
			<input type="hidden" name="Content[flag]" value="0" />
			<?php foreach ($contentFlags as $flag):?>
			<label><input type="checkbox" name="Content[flag][]" id="commoncontent-flag_<?= $flag['value'] ?>" value="<?= $flag['value'] ?>"<?php if($model->flag&$flag['value']) echo 'checked';?>><?= $flag['name'] ?></label>
			<?php endforeach;?>
		</td>
		<td><div class="help-block"></div></td>
	</tr>

    <?= $form->field($model, 'status')->dropDownList(ContentUtility::$status) ?>

    <?= $form->field($model, 'title_pic')->textInput(['maxlength' => 128]) ?>

    <?= $form->field($model, 'redirect_url')->textInput(['maxlength' => 128]) ?>

    <?= $form->field($model, 'keywords')->textInput(['maxlength' => 128]) ?>

    <?= $form->field($model, 'sub_title')->textInput(['maxlength' => 128]) ?>

    <?= $form->field($model, 'summary')->textarea(['rows' => 6]) ?>
	
	

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;
use common\models\config\Config;
use common\includes\CommonUtility;

/**
 * @var yii\web\View $this
 * @var app\models\Content $model
 * @var yii\widgets\ActiveForm $form
 */

$this->registerJsFile('static/common/js/common.js');

$formatArray=CommonUtility::getTitleFormat();
$formatValueArray = CommonUtility::getTitleFormatArray($model);

$contentFlags=CommonUtility::getFlag();

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
		<td class="hAlign_right padding_r10">
			<label style="font-weight:normal;" for="content-title_format">标题格式</label>:</td>
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
				<label class="checkbox-inline"><input type="checkbox" name="Content[title_format][]" id="content-title_format_<?= $value ?>" value="<?= $value ?>" <?php echo $checked?>><?= $label ?></label>
			<?php }?>
			<input name="Content[title_format][]" id="content-title_format_c" 
				class="form-control" style="display: inline-block;width:80px; margin-left:10px;" value="<?php echo end($formatValueArray);?>"/>
			<label style="font-weight:normal;" for="content_title_format_c" class="lb">颜色</label>
		</td>
		<td><div class="help-block"></div></td>
	</tr>
	
	<tr class="form-group field-content-title_att">
		<td class="hAlign_right padding_r10">
			<label style="font-weight:normal;" for="content-title_pic">自定义属性</label>:
		</td>
		<td>
			<label style="font-weight:normal;" for="content-att1"><?php echo $att1Lable?></label>:
			<?= Html::dropDownList('Content[att1]',$model->att1,$att1Array,['class'=>'form-control','style'=>'width:120px;display: inline;']) ?>
			
			<label style="font-weight:normal;" for="content-att2"><?php echo $att2Lable?></label>:
			<?= Html::dropDownList('Content[att2]',$model->att2,$att2Array,['class'=>'form-control','style'=>'width:120px;display: inline;']) ?>
			
			<label style="font-weight:normal;" for="commoncontent-att3"><?php echo $att3Lable?></label>:
			<?= Html::dropDownList('Content[att3]',$model->att3,$att3Array,['class'=>'form-control','style'=>'width:120px;display: inline;']) ?>
		</td>
		<td><div class="help-block"></div></td>
	</tr>

	<tr class="form-group field-content-flag">
		<td class="hAlign_right padding_r10">
			<label style="font-weight:normal;" for="content-flag">聚合标签</label>:</td>
		<td>
			<input type="hidden" name="Content[flag]" value="0" />
			<?php foreach ($contentFlags as $flag):?>
			<label class="checkbox-inline"><input type="checkbox" name="Content[flag][]" id="commoncontent-flag_<?= $flag['value'] ?>" value="<?= $flag['value'] ?>"<?php if($model->flag&$flag['value']) echo 'checked';?>><?= $flag['name'] ?></label>
			<?php endforeach;?>
		</td>
		<td><div class="help-block"></div></td>
	</tr>


    <tr class="form-group field-content-title_pic">
		<td class="hAlign_right padding_r10" >
			<label style="font-weight:normal;" for="content-title_pic">标题图片</label>:</td>
		<td>
			<div class="file-box">
			<input type="text" id="content-title_pic" class="form-control" style="display: inline-block; width:500px; " name="Content[title_pic]" value="<?php echo $model['title_pic']?>" maxlength="128">
			<input type='button' class='form-control' style="display: inline-block;width:60px;" value='浏览...' /> 
			<input type="file" name="Content[title_pic]" class="form-control file" onchange="document.getElementById('content-title_pic').value=getPath(this);" /> 
			</div>
		</td>
		<td><div class="help-block"></div></td>
	</tr>

    <?= $form->field($model, 'redirect_url')->textInput(['maxlength' => 128]) ?>


	


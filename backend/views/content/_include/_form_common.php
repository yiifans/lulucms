<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\Content $model
 * @var yii\widgets\ActiveForm $form
 */

$formatArray=['b'=>'加粗','i'=>'斜体','u'=>'下划线','s'=>'删除线'];

$att1Array=['0'=>'无','1'=>'一级头条','2'=>'二级头条','3'=>'三级头条','4'=>'四级头条','5'=>'五级头条','6'=>'六级头条','7'=>'七级头条','8'=>'八级头条','9'=>'九级头条'];
$att2Array=['0'=>'无','1'=>'一级推荐','2'=>'二级推荐','3'=>'三级推荐','4'=>'四级推荐','5'=>'五级推荐','6'=>'六级推荐','7'=>'七级推荐','8'=>'八级推荐','9'=>'九级推荐'];
$att3Array=['0'=>'无','1'=>'一级置顶','2'=>'二级置顶','3'=>'三级置顶','4'=>'四级置顶','5'=>'五级置顶','6'=>'六级置顶','7'=>'七级置顶','8'=>'八级置顶','9'=>'九级置顶'];

$flagArray=['1'=>'原创','2'=>'热点','4'=>'组图','8'=>'爆料','16'=>'焦点','32'=>'幻灯','64'=>'滚动','128'=>'其它'];

?>
    <input type="hidden" id="content-channel_id" class="form-control" name="Content[channel_id]" value="<?= $chnid ?>">
  
    <?= $form->field($model, 'title')->textInput(['maxlength' => 128]) ?>
  
  	<tr class="form-group field-content-title_format">
		<td class="hAlign_right padding_r10" width="150px">
			<label class="control-label" for="content-title_format">标题格式</label>:</td>
		<td>
			<?php foreach ($formatArray as $value=>$label):?>
			<label><input type="checkbox" name="Content[title_format][]" id="content-title_format_<?= $value ?>" value="<?= $value ?>"><?= $label ?></label>
			<?php endforeach;?>
			<input name="Content[title_format][]" id="content-title_format_c" style="width:40px;"/>
			<label for="content_title_format_c" class="lb">颜色</label>
		</td>
		<td></td>
		<td><div class="help-block"></div></td>
	</tr>
	
	<tr class="form-group field-content-title_att">
		<td class="hAlign_right padding_r10" width="150px">
			<label class="control-label" for="content-title_pic">自定义属性</label>:
		</td>
		<td>
			<label class="control-label" for="content-att1">属性1</label>:
			<?= Html::dropDownList('Content[att1]',$model->att1,$att1Array) ?>
			
			<label class="control-label" for="content-att2">属性2</label>:
			<?= Html::dropDownList('Content[att2]',$model->att2,$att2Array) ?>
			
			<label class="control-label" for="commoncontent-att3">属性3</label>:
			<?= Html::dropDownList('Content[att3]',$model->att3,$att3Array) ?>
		</td>
		<td></td>
		<td><div class="help-block"></div></td>
	</tr>

	<tr class="form-group field-content-flag">
		<td class="hAlign_right padding_r10" width="150px">
			<label class="control-label" for="content-flag">聚合标签</label>:</td>
		<td>
			<input type="hidden" name="Content[flag]" value="0" />
			<?php foreach ($flagArray as $value=>$label):?>
			<label><input type="checkbox" name="Content[flag][]" id="commoncontent-flag_<?= $value ?>" value="<?= $value ?>"><?= $label ?></label>
			<?php endforeach;?>
		</td>
		<td></td>
		<td><div class="help-block"></div></td>
	</tr>

    <?= $form->field($model, 'status')->checkbox([],false) ?>

    <?= $form->field($model, 'title_pic')->textInput(['maxlength' => 128]) ?>

    <?= $form->field($model, 'redirect_url')->textInput(['maxlength' => 128]) ?>

    <?= $form->field($model, 'keywords')->textInput(['maxlength' => 128]) ?>

    <?= $form->field($model, 'sub_title')->textInput(['maxlength' => 128]) ?>

    <?= $form->field($model, 'summary')->textarea(['rows' => 6]) ?>
	
	

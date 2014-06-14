<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\Catalog $model
 * @var yii\widgets\ActiveForm $form
 */
$formatArray=['b'=>'加粗','i'=>'斜体','u'=>'下划线','s'=>'删除线'];
$att1Array=['0'=>'无','1'=>'一级头条','2'=>'二级头条','3'=>'三级头条','4'=>'四级头条','5'=>'五级头条','6'=>'六级头条','7'=>'七级头条','8'=>'八级头条','9'=>'九级头条'];
$att2Array=['0'=>'无','1'=>'一级推荐','2'=>'二级推荐','3'=>'三级推荐','4'=>'四级推荐','5'=>'五级推荐','6'=>'六级推荐','7'=>'七级推荐','8'=>'八级推荐','9'=>'九级推荐'];
$att3Array=['0'=>'无','1'=>'一级置顶','2'=>'二级置顶','3'=>'三级置顶','4'=>'四级置顶','5'=>'五级置顶','6'=>'六级置顶','7'=>'七级置顶','8'=>'八级置顶','9'=>'九级置顶'];
$flagArray=['1'=>'原创','2'=>'热点','3'=>'组图','4'=>'爆料','5'=>'焦点','6'=>'幻灯','7'=>'滚动','8'=>'其它'];

?>

<?php $form = ActiveForm::begin(); ?>

		
		
	
<input type="hidden" id="content-channel_id" name="Content[channel_id]" value="<?php echo $chnid?>"/>

<table class="table">
<tr>
<td width="100px">标题</td>
<td>
<input type="text" id="content-title" name="Content[title]" style="width:350px;"/>

<?php foreach ($formatArray as $value=>$label):?>
<label><input type="checkbox" name="Content[title_format][]" id="content-title_format_<?= $value ?>" value="<?= $value ?>"><?= $label ?></label>
<?php endforeach;?>
<input name="Content[title_format][]" id="content-title_format_c" style="width:40px;"/>
<label for="content_title_format_c" class="lb">颜色</label>
</td>
</tr>

<tr>
<td>自定义属性</td>
<td>
<label for="content_att1" class="lb">头条</label>
<select id="content-att1" name="Content[att1]">
<?php foreach ($att1Array as $value=>$label):?>
<option value="<?= $value ?>"><?= $label ?></option>
<?php endforeach;?>
</select>

<label for="content_att2" class="lb">推荐</label>
<select id="content-att2" name="Content[att2]">
<?php foreach ($att2Array as $value=>$label):?>
<option value="<?= $value ?>"><?= $label ?></option>
<?php endforeach;?>
</select>

<label for="content_att3" class="lb">置顶</label>
<select id="content-att3" name="Content[att3]">
<?php foreach ($att3Array as $value=>$label):?>
<option value="<?= $value ?>"><?= $label ?></option>
<?php endforeach;?>
</select>
</td>
</tr>

<tr>
<td>聚合标签</td>
<td>
<input type="hidden" name="Content[flag]" value="0" />
<?php foreach ($flagArray as $value=>$label):?>
<label><input type="checkbox" name="Content[flag][]" id="content-flag_<?= $value ?>" value="<?= $value ?>"><?= $label ?></label>
<?php endforeach;?>
</td>
</tr>


<tr>
<td>关键字</td>
<td><input type="text" id="content-keywords" name="Content[keywords]" style="width:350px;"/></td>
</tr>

<tr>
<td>转向链接</td>
<td><input type="text" id="content-redirect_url" name="Content[redirect_url]" style="width:350px;"/></td>
</tr>

<tr>
<td>标题图片</td>
<td><input type="text" id="content-title_pic" name="Content[title_pic]" style="width:350px;"/></td>
</tr>


</table>


<table class="table">
			<?php foreach ($fields as $field):?>
			<tr>
			<td width="100px"><?= $field['name'] ?></td>
			<td>
				<?php echo $this->render('formtype/_'.$field['back_form_type'], [
					'field' => $field,
					
				]); ?>
				
			</td>
			</tr>
			<?php endforeach;?>
		</table>
		
		<div class="form-group">
			<?= Html::submitButton( 'Create' , ['class' =>  'btn btn-primary']) ?>
		</div>

	<?php ActiveForm::end(); ?>
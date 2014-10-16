<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use components\helpers\TStringHelper;
use components\widgets\Tabs;

$options = '<option value="0">根节点</option>';
foreach($this->channels as $row)
{
	$style = '';
	if($row['is_leaf'])
	{
		$style = ' disabled="disabled" style="color:red;"';
	}
	else if($model['parent_id'] == intval($row['id']))
	{
		$style = ' selected';
	}
	$options .= '<option value="' . $row['id'] . '"' . $style . '>' . TStringHelper::blank($row['level']) . $row['name_alias'] . '</option>';
}
?>

<div class="channel-form">

    <?php
		$isLeafEnable = $model['is_leaf'] ? 'disabled' : null;
		$disabled = $model->isNewRecord ? null : 'disabled';
		$form = ActiveForm::begin([
			'fieldConfig' => $this->getDefaultFieldConfig()
		]);
	?>
    <?php 
	  Tabs::begin([
	      'items' => [
	          ['label' => '基本信息', 'contentId' => 'tableBasic'],
	          ['label' => '模型\模板', 'contentId' => 'tableModel'],
	          ['label' => 'SEO设置', 'contentId' => 'tableSEO'],
	      ],
	  ]);
	?>	
	<div id="tableBasic" class="tab-pane active">
		<table class="table">

		<tr class="form-group field-channel-parent_id required">
			<td class="hAlign_right padding_r10"><label style="font-weight:normal;" for="channel-parent_id">父级：</label></td>
			<td>
				<select id="channel-parent_id" class="form-control" name="Channel[parent_id]">
				<?php echo $options?>
				</select>
			</td>
			<td>&nbsp;&nbsp;</td>
		</tr>
		
		<?= $form->field($model, 'name')->textInput(['maxlength' => 120])?>

		<?= $form->field($model, 'name_alias')->textInput(['maxlength' => 120])?>

		<?= $form->field($model, 'name_url')->textInput(['maxlength' => 120])?>
		
		<?= $form->field($model, 'redirect_url')->textInput(['maxlength' => 80])?>
		
		<?= $form->field($model, 'is_leaf')->checkbox(['readonly'=>$model['is_leaf']],false)?>
	
		<?= $form->field($model, 'is_nav')->checkbox([],false)?>

		<?= $form->field($model, 'sort_num')->textInput()?>
		
		<?= $form->field($model, 'note')->textarea(['rows' => 3]) ?>

		</table>
	</div>
	
	
	<div id="tableModel" class="tab-pane">
	    <table class="table">
			<?= $form->field($model, 'table')->dropDownList(ArrayHelper::map($tableList,'table_name','name'))?>
			
			<?= $form->field($model, 'channel_tpl')->dropDownList(ArrayHelper::map($channelTpls,'name','name','table'))?>
	
			<?= $form->field($model, 'list_tpl')->dropDownList(ArrayHelper::map($listTpls,'name','name','table'))?>
			
			<?= $form->field($model, 'detail_tpl')->dropDownList(ArrayHelper::map($detailTpls,'name','name','table'))?>
			
			<?= $form->field($model, 'page_size')->textInput()?>
			
	    </table>
    </div>
    
	<div id="tableSEO" class="tab-pane">
	    <table class="table">
		    <?= $form->field($model, 'seo_title')->textInput(['maxlength' => 128]) ?>
		
		    <?= $form->field($model, 'seo_keywords')->textInput(['maxlength' => 128]) ?>
		
		    <?= $form->field($model, 'seo_description')->textarea(['rows' => 3]) ?>
	    </table>
    </div>
    
    <?php Tabs::end();?>
    
    <?php $this->echoButtons2($model); ?>
    		
	<?php ActiveForm::end(); ?>

</div>

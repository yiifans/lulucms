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
		$ret.='  ';
	}
	return $ret;
}
$parents=[
	'0' =>'root',
];
foreach ($treeList as $row)
{
	$parents[$row['id']]=getPrefix($row['level']).$row['name_zh'];
	//array_push($parents, $var)
}
?>

<div class="catalog-form">

	<?php $form = ActiveForm::begin(); ?>

		<!--  <?= $form->field($model, 'parent_id')->textInput() ?>  -->
		
		<?= $form->field($model, 'parent_id')->dropDownList($parents) ?>
		
		<?= $form->field($model, 'name_en')->textInput(['maxlength' => 80]) ?>

		<?= $form->field($model, 'name_zh')->textInput(['maxlength' => 80]) ?>

		<?= $form->field($model, 'is_end')->checkbox() ?>

		<?= $form->field($model, 'is_nav')->checkbox() ?>

		<?= $form->field($model, 'sort_num')->textInput() ?>

		<?= $form->field($model, 'model_id')->textInput() ?>
		
		<?= $form->field($model, 'model_id')->dropDownList(ArrayHelper::map($modelList,'id','name','table_name')) ?>
		
		<?= $form->field($model, 'page_size')->textInput() ?>

		<?= $form->field($model, 'redirect_url')->textInput(['maxlength' => 80]) ?>

		<?= $form->field($model, 'tpl_page')->textInput(['maxlength' => 80]) ?>

		<?= $form->field($model, 'tpl_list')->textInput(['maxlength' => 80]) ?>

		<?= $form->field($model, 'tpl_content')->textInput(['maxlength' => 80]) ?>

		<?= $form->field($model, 'note')->textInput(['maxlength' => 80]) ?>

		<?= $form->field($model, 'note2')->textInput(['maxlength' => 80]) ?>

		<div class="form-group">
			<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>

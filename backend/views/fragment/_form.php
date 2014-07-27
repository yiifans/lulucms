<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\models\Fragment $model
 * @var yii\widgets\ActiveForm $form
 */

$categoryArray=[];
$categoryArray['0']='无';
foreach ($categories as $category)
{
	$categoryArray[$category['id']]=$category['name'];
}
?>

<div class="fragment-form">

    <?php
    	$disabled= $model->isNewRecord? null:'disabled';
    	$form = ActiveForm::begin([
			'fieldConfig' => $this->getDefaultFieldConfig(),
	    ]); ?>
	<?php echo Html::activeHiddenInput($model, 'type');?>
    <table class="table">

    <?= $form->field($model, 'category_id')->dropDownList($categoryArray) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 64]) ?>

    <?= $form->field($model, 'sort_num')->textInput() ?>

    
	</table>
<?php $this->echoButtons2($model); ?>
    <?php ActiveForm::end(); ?>

</div>

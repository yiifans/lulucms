<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\search\DefineTableFieldSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="define-table-field-search">

	<?php $form = ActiveForm::begin([
		'action' => ['index'],
		'method' => 'get',
	]); ?>

		<?= $form->field($model, 'id') ?>

		<?= $form->field($model, 'table_id') ?>

		<?= $form->field($model, 'lable') ?>

		<?= $form->field($model, 'name') ?>

		<?= $form->field($model, 'type') ?>

		<?php // echo $form->field($model, 'length') ?>

		<?php // echo $form->field($model, 'sort_num') ?>

		<?php // echo $form->field($model, 'note') ?>

		<div class="form-group">
			<?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
			<?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>

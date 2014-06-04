<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\search\DefineModelSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="define-model-search">

	<?php $form = ActiveForm::begin([
		'action' => ['index'],
		'method' => 'get',
	]); ?>

		<?= $form->field($model, 'id') ?>

		<?= $form->field($model, 'table_id') ?>

		<?= $form->field($model, 'name') ?>

		<?= $form->field($model, 'alias') ?>

		<?= $form->field($model, 'is_enable')->checkbox() ?>

		<?php // echo $form->field($model, 'is_nav')->checkbox() ?>

		<?php // echo $form->field($model, 'sort_num') ?>

		<?php // echo $form->field($model, 'front_html') ?>

		<?php // echo $form->field($model, 'back_html') ?>

		<?php // echo $form->field($model, 'note') ?>

		<div class="form-group">
			<?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
			<?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>

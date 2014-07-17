<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\models\search\TplItemSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="tpl-item-search">

	<?php $form = ActiveForm::begin([
		'action' => ['index'],
		'method' => 'get',
	]); ?>

		<?= $form->field($model, 'id') ?>

		<?= $form->field($model, 'category_id') ?>

		<?= $form->field($model, 'model_id') ?>

		<?= $form->field($model, 'name') ?>

		<?= $form->field($model, 'file_path') ?>

		<?php // echo $form->field($model, 'file_name') ?>

		<?php // echo $form->field($model, 'file_content') ?>

		<?php // echo $form->field($model, 'create_time') ?>

		<?php // echo $form->field($model, 'modify_time') ?>

		<?php // echo $form->field($model, 'note') ?>

		<div class="form-group">
			<?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
			<?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>

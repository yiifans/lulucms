<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\search\CatalogSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="catalog-search">

	<?php $form = ActiveForm::begin([
		'action' => ['index'],
		'method' => 'get',
	]); ?>

		<?= $form->field($model, 'id') ?>

		<?= $form->field($model, 'parent_id') ?>

		<?= $form->field($model, 'name_en') ?>

		<?= $form->field($model, 'name_zh') ?>

		<?= $form->field($model, 'redirect_url') ?>

		<?php // echo $form->field($model, 'is_end')->checkbox() ?>

		<?php // echo $form->field($model, 'is_nav')->checkbox() ?>

		<?php // echo $form->field($model, 'sort_num') ?>

		<?php // echo $form->field($model, 'model_id') ?>

		<?php // echo $form->field($model, 'tpl_page') ?>

		<?php // echo $form->field($model, 'tpl_list') ?>

		<?php // echo $form->field($model, 'tpl_content') ?>

		<?php // echo $form->field($model, 'page_size') ?>

		<?php // echo $form->field($model, 'note') ?>

		<?php // echo $form->field($model, 'note2') ?>

		<div class="form-group">
			<?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
			<?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>

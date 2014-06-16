<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\search\DefineTable $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="define-table-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'name_en') ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'is_default') ?>

    <?= $form->field($model, 'channel_tpl') ?>

    <?php // echo $form->field($model, 'list_tpl') ?>

    <?php // echo $form->field($model, 'detail_tpl') ?>

    <?php // echo $form->field($model, 'back_form_tpl') ?>

    <?php // echo $form->field($model, 'back_action_index') ?>

    <?php // echo $form->field($model, 'back_action_create') ?>

    <?php // echo $form->field($model, 'back_action_update') ?>

    <?php // echo $form->field($model, 'back_action_delete') ?>

    <?php // echo $form->field($model, 'back_action_other') ?>

    <?php // echo $form->field($model, 'front_form_tpl') ?>

    <?php // echo $form->field($model, 'front_action_index') ?>

    <?php // echo $form->field($model, 'front_action_create') ?>

    <?php // echo $form->field($model, 'front_action_update') ?>

    <?php // echo $form->field($model, 'front_action_delete') ?>

    <?php // echo $form->field($model, 'front_action_other') ?>

    <?php // echo $form->field($model, 'note') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

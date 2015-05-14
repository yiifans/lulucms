<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\DefineTable $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="define-table-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 80]) ?>

    <?= $form->field($model, 'name_en')->textInput(['maxlength' => 80]) ?>

    <?= $form->field($model, 'is_default')->textInput() ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => 80]) ?>

    <?= $form->field($model, 'note')->textInput(['maxlength' => 80]) ?>

    <?= $form->field($model, 'channel_tpl')->textInput(['maxlength' => 64]) ?>

    <?= $form->field($model, 'list_tpl')->textInput(['maxlength' => 64]) ?>

    <?= $form->field($model, 'detail_tpl')->textInput(['maxlength' => 64]) ?>

    <?= $form->field($model, 'back_form_tpl')->textInput(['maxlength' => 64]) ?>

    <?= $form->field($model, 'back_action_index')->textInput(['maxlength' => 64]) ?>

    <?= $form->field($model, 'back_action_create')->textInput(['maxlength' => 64]) ?>

    <?= $form->field($model, 'back_action_update')->textInput(['maxlength' => 64]) ?>

    <?= $form->field($model, 'back_action_delete')->textInput(['maxlength' => 64]) ?>

    <?= $form->field($model, 'back_action_other')->textInput(['maxlength' => 64]) ?>

    <?= $form->field($model, 'front_form_tpl')->textInput(['maxlength' => 64]) ?>

    <?= $form->field($model, 'front_action_index')->textInput(['maxlength' => 64]) ?>

    <?= $form->field($model, 'front_action_create')->textInput(['maxlength' => 64]) ?>

    <?= $form->field($model, 'front_action_update')->textInput(['maxlength' => 64]) ?>

    <?= $form->field($model, 'front_action_delete')->textInput(['maxlength' => 64]) ?>

    <?= $form->field($model, 'front_action_other')->textInput(['maxlength' => 64]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

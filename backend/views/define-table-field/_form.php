<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\DefineTableField $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="define-table-field-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'table')->textInput(['maxlength' => 80]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 80]) ?>

    <?= $form->field($model, 'name_en')->textInput(['maxlength' => 80]) ?>

    <?= $form->field($model, 'type')->textInput(['maxlength' => 80]) ?>

    <?= $form->field($model, 'front_form_type')->textInput(['maxlength' => 64]) ?>

    <?= $form->field($model, 'back_form_type')->textInput(['maxlength' => 64]) ?>

    <?= $form->field($model, 'length')->textInput() ?>

    <?= $form->field($model, 'is_null')->textInput() ?>

    <?= $form->field($model, 'is_main')->textInput() ?>

    <?= $form->field($model, 'is_sys')->textInput() ?>

    <?= $form->field($model, 'sort_num')->textInput() ?>

    <?= $form->field($model, 'front_status')->textInput() ?>

    <?= $form->field($model, 'back_status')->textInput() ?>

    <?= $form->field($model, 'note')->textInput(['maxlength' => 200]) ?>

    <?= $form->field($model, 'front_fun_add')->textInput(['maxlength' => 64]) ?>

    <?= $form->field($model, 'front_fun_update')->textInput(['maxlength' => 64]) ?>

    <?= $form->field($model, 'front_fun_show')->textInput(['maxlength' => 64]) ?>

    <?= $form->field($model, 'back_fun_add')->textInput(['maxlength' => 64]) ?>

    <?= $form->field($model, 'back_fun_update')->textInput(['maxlength' => 64]) ?>

    <?= $form->field($model, 'back_fun_show')->textInput(['maxlength' => 64]) ?>

    <?= $form->field($model, 'front_form_option')->textInput(['maxlength' => 128]) ?>

    <?= $form->field($model, 'front_form_default')->textInput(['maxlength' => 128]) ?>

    <?= $form->field($model, 'back_form_option')->textInput(['maxlength' => 128]) ?>

    <?= $form->field($model, 'back_form_default')->textInput(['maxlength' => 128]) ?>

    <?= $form->field($model, 'front_form_source')->textInput(['maxlength' => 512]) ?>

    <?= $form->field($model, 'front_form_html')->textInput(['maxlength' => 512]) ?>

    <?= $form->field($model, 'front_note')->textInput(['maxlength' => 512]) ?>

    <?= $form->field($model, 'back_form_source')->textInput(['maxlength' => 512]) ?>

    <?= $form->field($model, 'back_form_html')->textInput(['maxlength' => 512]) ?>

    <?= $form->field($model, 'back_note')->textInput(['maxlength' => 512]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

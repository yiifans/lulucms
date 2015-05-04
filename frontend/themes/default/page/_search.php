<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\models\search\PageSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="page-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'category_id') ?>

    <?= $form->field($model, 'publish_time') ?>

    <?= $form->field($model, 'modify_time') ?>

    <?= $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'title') ?>

    <?php // echo $form->field($model, 'title_format') ?>

    <?php // echo $form->field($model, 'title_pic') ?>

    <?php // echo $form->field($model, 'summary') ?>

    <?php // echo $form->field($model, 'body') ?>

    <?php // echo $form->field($model, 'tpl') ?>

    <?php // echo $form->field($model, 'seo_title') ?>

    <?php // echo $form->field($model, 'seo_keywords') ?>

    <?php // echo $form->field($model, 'seo_description') ?>

    <?php // echo $form->field($model, 'sort_num') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var app\models\DefineTableField $model
 */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Define Table Fields', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="define-table-field-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'table',
            'name',
            'name_en',
            'type',
            'length',
            'is_null',
            'is_main',
            'is_sys',
            'sort_num',
            'note',
            'front_status',
            'front_fun_add',
            'front_fun_update',
            'front_fun_show',
            'front_form_type',
            'front_form_option',
            'front_form_default',
            'front_form_source',
            'front_form_html',
            'front_note',
            'back_status',
            'back_fun_add',
            'back_fun_update',
            'back_fun_show',
            'back_form_type',
            'back_form_option',
            'back_form_default',
            'back_form_source',
            'back_form_html',
            'back_note',
        ],
    ]) ?>

</div>

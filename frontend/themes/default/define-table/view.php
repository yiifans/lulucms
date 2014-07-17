<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var app\models\DefineTable $model
 */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Define Tables', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="define-table-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->name_en], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->name_en], [
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
            'name',
            'name_en',
            'description',
            'is_default',
            'channel_tpl',
            'list_tpl',
            'detail_tpl',
            'back_form_tpl',
            'back_action_index',
            'back_action_create',
            'back_action_update',
            'back_action_delete',
            'back_action_other',
            'front_form_tpl',
            'front_action_index',
            'front_action_create',
            'front_action_update',
            'front_action_delete',
            'front_action_other',
            'note',
        ],
    ]) ?>

</div>

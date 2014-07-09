<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var common\models\DictCategory $model
 */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Dict Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dict-category-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->key], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->key], [
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
            'key',
            'name',
            'description',
            'is_sys',
        ],
    ]) ?>

</div>

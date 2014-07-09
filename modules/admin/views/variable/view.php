<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var common\models\Variable $model
 */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Variables', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="variable-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->variable], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->variable], [
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
            'variable',
            'name',
            'value:ntext',
            'data_type',
            'description',
            'is_cache',
            'sort_num',
        ],
    ]) ?>

</div>

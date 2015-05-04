<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var common\models\Fragment1Data $model
 */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Fragment1 Datas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fragment1-data-view">

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
            'fragment_id',
            'data:ntext',
            'sort_num',
        ],
    ]) ?>

</div>

<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\DictCategory $model
 */

$this->title = 'Update Dict Category: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Dict Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->key]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="dict-category-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

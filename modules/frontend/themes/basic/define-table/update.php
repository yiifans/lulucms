<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\DefineTable $model
 */

$this->title = 'Update Define Table: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Define Tables', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->name_en]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="define-table-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

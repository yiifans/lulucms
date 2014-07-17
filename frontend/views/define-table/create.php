<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\DefineTable $model
 */

$this->title = 'Create Define Table';
$this->params['breadcrumbs'][] = ['label' => 'Define Tables', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="define-table-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

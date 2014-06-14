<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\DefineTableField $model
 */

$this->title = 'Create Define Table Field';
$this->params['breadcrumbs'][] = ['label' => 'Define Table Fields', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="define-table-field-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

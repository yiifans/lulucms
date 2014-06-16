<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\Dict $model
 */

$this->title = 'Create Dict';
$this->params['breadcrumbs'][] = ['label' => 'Dicts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dict-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

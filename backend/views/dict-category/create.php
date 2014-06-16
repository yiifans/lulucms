<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\DictCategory $model
 */

$this->title = 'Create Dict Category';
$this->params['breadcrumbs'][] = ['label' => 'Dict Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dict-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

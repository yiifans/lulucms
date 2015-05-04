<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\Config $model
 */

$this->title = 'Create Config';
$this->params['breadcrumbs'][] = ['label' => 'Configs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="config-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

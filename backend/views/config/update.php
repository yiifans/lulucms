<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\Config $model
 */

$this->title = 'Update Config: ' . $model->name;

?>
<div class="config-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

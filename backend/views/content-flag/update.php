<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\ContentFlag $model
 */

$this->title = '修改标签: ' . $model->name;
$this->addBreadcrumb('聚合标签',['index']);
$this->addBreadcrumb($this->title);
?>
<div class="content-flag-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

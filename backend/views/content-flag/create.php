<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\ContentFlag $model
 */

$this->title = '新建标签';
$this->addBreadcrumb('聚合标签',['index']);
$this->addBreadcrumb($this->title);
?>
<div class="content-flag-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

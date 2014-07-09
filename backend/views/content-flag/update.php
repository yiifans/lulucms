<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\ContentFlag $model
 */

$this->title = '修改标签: ' . $model->name;
$this->addBreadcrumb('页面管理',['index']);
$this->addBreadcrumb($this->title);
?>
<div class="content-flag-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

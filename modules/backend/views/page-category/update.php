<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\PageCategory $model
 */

$this->title = '修改分类: ' . $model->name;
$this->addBreadcrumb('页面分类',['index']);
$this->addBreadcrumb($this->title);

?>
<div class="page-category-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

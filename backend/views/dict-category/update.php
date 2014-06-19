<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\DictCategory $model
 */

$this->title = '修改分类：'. $model->name;
$this->addBreadcrumb('字典分类',['index']);
$this->addBreadcrumb($this->title);

?>
<div class="dict-category-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

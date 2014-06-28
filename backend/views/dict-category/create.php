<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\DictCategory $model
 */

$this->title = '新建分类';
$this->addBreadcrumb('字典分类',['index']);
$this->addBreadcrumb($this->title);

?>
<div class="dict-category-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

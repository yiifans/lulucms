<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\Page $model
 */

$this->title = '修改页面: ' . $model->title;
$this->addBreadcrumb('页面管理',['index']);
$this->addBreadcrumb($this->title);
?>
<div class="page-update">

    <?= $this->render('_form', [
        'model' => $model,
    		'categories' => $categories,
    		'tpls' => $tpls,
    ]) ?>

</div>

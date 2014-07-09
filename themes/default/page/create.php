<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\Page $model
 */

$this->title = '新建页面';
$this->addBreadcrumb('页面管理',['index']);
$this->addBreadcrumb($this->title);
?>
<div class="page-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    		'categories' => $categories,
    		'tpls' => $tpls,
    ]) ?>

</div>

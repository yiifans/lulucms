<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\Dict $model
 */

$this->title = '添加字典';
$this->addBreadcrumb('数据字典',['index']);
$this->addBreadcrumb($this->title);

?>
<div class="dict-create">
    <?= $this->render('_form', [
        'model' => $model,
    		'parent'=>$parent,
    ]) ?>

</div>

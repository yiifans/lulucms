<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\Dict $model
 */

$this->title = '修改字典'. $model->name;
$this->addBreadcrumb('数据字典',['index']);
$this->addBreadcrumb($this->title);

?>
<div class="dict-update">

    <?= $this->render('_form', [
        'model' => $model,
    		'parent'=>$parent,
    ]) ?>

</div>

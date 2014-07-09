<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\Variable $model
 */

$this->title = '修改变量：'.$model->name;
$this->addBreadCrumb('自定义变量',['index']);
$this->addBreadCrumb($this->title);

?>
<div class="variable-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\Variable $model
 */

$this->title = '新建变量';
$this->addBreadCrumb('自定义变量',['index']);
$this->addBreadCrumb($this->title);

?>
<div class="variable-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

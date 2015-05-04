<?php

use yii\helpers\Html;
use common\includes\CommonUtility;

/**
 * @var yii\web\View $this
 * @var common\models\Fragment $model
 */
$this->title = '修改碎片: ' . $model->name;
$this->addBreadcrumb(CommonUtility::getFragmentType($type).'管理',['index','type'=>$type]);
$this->addBreadcrumb($this->title);
?>
<div class="fragment-update">

    <?= $this->render('_form', [
        'model' => $model,
    		'categories'=>$categories,
    		'type'=>$type,
    ]) ?>

</div>

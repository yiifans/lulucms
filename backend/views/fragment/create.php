<?php

use yii\helpers\Html;
use common\includes\CommonUtility;

/**
 * @var yii\web\View $this
 * @var common\models\Fragment $model
 */

$this->title = '新建碎片';
$this->addBreadcrumb(CommonUtility::getFragmentType($type).'管理',['index','type'=>$type]);
$this->addBreadcrumb($this->title);
?>
<div class="fragment-create">

    <?= $this->render('_form', [
        'model' => $model,
    		'categories'=>$categories,
    		'type'=>$type,
    ]) ?>

</div>

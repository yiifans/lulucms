<?php

use yii\helpers\Html;
use common\includes\CommonUtility;

/**
 * @var yii\web\View $this
 * @var common\models\FragmentCategory $model
 */

$this->title = '修改分类: ' . $model->name;
$this->addBreadcrumb(CommonUtility::getFragmentType($type).'管理',['fragment/index','type'=>$type]);
$this->addBreadcrumb('碎片分类',['index','type'=>$type]);
$this->addBreadcrumb($this->title);
?>
<div class="fragment-category-update">

    <?= $this->render('_form', [
        'model' => $model,
    		'type'=>$type,
    ]) ?>

</div>

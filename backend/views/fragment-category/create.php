<?php

use yii\helpers\Html;
use common\includes\CommonUtility;

/**
 * @var yii\web\View $this
 * @var common\models\FragmentCategory $model
 */

$this->title = '新建分类';
$this->addBreadcrumb(CommonUtility::getFragmentType($type).'管理',['fragment/index','type'=>$type]);
$this->addBreadcrumb('碎片分类',['index','type'=>$type]);
$this->addBreadcrumb($this->title);
?>
<div class="fragment-category-create">

    <?= $this->render('_form', [
        'model' => $model,
    		'type'=>$type,
    ]) ?>

</div>

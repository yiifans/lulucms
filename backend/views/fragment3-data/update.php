<?php

use yii\helpers\Html;
use common\includes\CommonUtility;

/**
 * @var yii\web\View $this
 * @var common\models\Fragment3Data $model
 */

$this->title = '编辑内容';
$this->addBreadcrumb(CommonUtility::getFragmentType(3).'管理',['fragment/index','type'=>3]);
$this->addBreadcrumb($currentFragment->name,['index','fraid'=>$currentFragment->id]);
$this->addBreadcrumb($this->title);
?>
<div class="fragment3-data-update">

    <?= $this->render('_form', [
        'model' => $model,
    		'currentFragment'=>$currentFragment,
    ]) ?>

</div>

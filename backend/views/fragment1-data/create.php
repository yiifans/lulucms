<?php

use yii\helpers\Html;
use common\includes\CommonUtility;

/**
 * @var yii\web\View $this
 * @var common\models\Fragment1Data $model
 */

$this->title = '新建内容';
$this->addBreadcrumb(CommonUtility::getFragmentType(1).'管理',['fragment/index','type'=>1]);
$this->addBreadcrumb($currentFragment->name,['index','fraid'=>$currentFragment->id]);
$this->addBreadcrumb($this->title);
?>
<div class="fragment1-data-create">

    <?= $this->render('_form', [
        'model' => $model,
    		'currentFragment'=>$currentFragment,
    ]) ?>

</div>

<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\Dict $model
 */

$this->title = '修改字典'. $model->name;
$this->addBreadcrumb('字典分类',['dict-category/index']);
foreach ($parents as $item)
{
	$this->addBreadcrumb($item->name, ['index','pid'=>$item->id]);
}
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="dict-update">

    <?= $this->render('_form', [
        'model' => $model,
    		'parent'=>$parent,
    ]) ?>

</div>

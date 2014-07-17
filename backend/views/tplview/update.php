<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\TplView $model
 */

$this->title = 'Update Tpl View: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Tpl Views', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tpl-view-update">

	<h1><?= Html::encode($this->title) ?></h1>

	<?php echo $this->render('_form', [
		'model' => $model,
		'tableList' => $tableList,
		'tplViewCategoryList'=>$tplViewCategoryList,
	]); ?>

</div>

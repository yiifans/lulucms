<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\TplForm $model
 */

$this->title = 'Update Tpl Form: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Tpl Forms', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tpl-form-update">

	<h1><?= Html::encode($this->title) ?></h1>

	<?php echo $this->render('_form', [
		'model' => $model,
		'tplFormCategoryList'=>$tplFormCategoryList,
		'tableList' => $tableList,
	]); ?>

</div>

<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\TplCover $model
 */

$this->title = 'Update Tpl Cover: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Tpl Covers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tpl-cover-update">

	<h1><?= Html::encode($this->title) ?></h1>

	<?php echo $this->render('_form', [
		'model' => $model,
		'tableList' => $tableList,
		'tplCoverCategoryList' => $tplCoverCategoryList,
	]); ?>

</div>

<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\TplItemCategory $model
 */

$this->title = 'Update Tpl Item Category: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Tpl Item Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tpl-item-category-update">

	<h1><?= Html::encode($this->title) ?></h1>

	<?php echo $this->render('_form', [
		'model' => $model,
	]); ?>

</div>

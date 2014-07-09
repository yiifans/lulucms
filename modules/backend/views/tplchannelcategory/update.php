<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\TplCoverCategory $model
 */

$this->title = 'Update Tpl Cover Category: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Tpl Cover Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tpl-cover-category-update">

	<h1><?= Html::encode($this->title) ?></h1>

	<?php echo $this->render('_form', [
		'model' => $model,
	]); ?>

</div>

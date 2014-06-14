<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\DefineTable $model
 */

$this->title = '修改表: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => '表管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'tb' => $model->name_en]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="define-table-update">

	<h1><?= Html::encode($this->title) ?></h1>

	<?php echo $this->render('_form', [
		'model' => $model,
	]); ?>

</div>

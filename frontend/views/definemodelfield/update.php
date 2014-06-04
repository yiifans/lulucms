<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\DefineModelField $model
 */

$this->title = 'Update Define Model Field: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Define Model Fields', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="define-model-field-update">

	<h1><?= Html::encode($this->title) ?></h1>

	<?php echo $this->render('_form', [
		'model' => $model,
	]); ?>

</div>

<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\Test $model
 */

$this->title = 'Update Test: ' . $model->q;
$this->params['breadcrumbs'][] = ['label' => 'Tests', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->q, 'url' => ['view', 'id' => $model->q]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="test-update">

	<h1><?= Html::encode($this->title) ?></h1>

	<?php echo $this->render('_form', [
		'model' => $model,
	]); ?>

</div>

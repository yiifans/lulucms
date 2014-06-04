<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\DefineModel $model
 */

$this->title = 'Update Define Model: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Define Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="define-model-update">

	<h1><?= Html::encode($this->title) ?></h1>

	<?php echo $this->render('_form', [
		'model' => $model,
		'frontTplFormList'=>$frontTplFormList,
		'backTplFormList' => $backTplFormList,
	]); ?>

</div>

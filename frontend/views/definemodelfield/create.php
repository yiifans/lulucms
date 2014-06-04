<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\DefineModelField $model
 */

$this->title = 'Create Define Model Field';
$this->params['breadcrumbs'][] = ['label' => 'Define Model Fields', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="define-model-field-create">

	<h1><?= Html::encode($this->title) ?></h1>

	<?php echo $this->render('_form', [
		'model' => $model,
		
	]); ?>

</div>

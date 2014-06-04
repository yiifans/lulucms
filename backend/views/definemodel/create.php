<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\DefineModel $model
 */

$this->title = 'Create Define Model';
$this->params['breadcrumbs'][] = ['label' => 'Define Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="define-model-create">

	<h1><?= Html::encode($this->title) ?></h1>

	<?php echo $this->render('_form', [
		'model' => $model,
		'frontTplFormList'=>$frontTplFormList,
		'backTplFormList' => $backTplFormList,
	]); ?>

</div>

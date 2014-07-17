<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\TplIndex $model
 */

$this->title = 'Create Tpl Index';
$this->params['breadcrumbs'][] = ['label' => 'Tpl Indices', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tpl-index-create">

	<h1><?= Html::encode($this->title) ?></h1>

	<?php echo $this->render('_form', [
		'model' => $model,
	]); ?>

</div>

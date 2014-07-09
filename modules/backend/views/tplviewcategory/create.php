<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\TplViewCategory $model
 */

$this->title = 'Create Tpl View Category';
$this->params['breadcrumbs'][] = ['label' => 'Tpl View Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tpl-view-category-create">

	<h1><?= Html::encode($this->title) ?></h1>

	<?php echo $this->render('_form', [
		'model' => $model,
	]); ?>

</div>

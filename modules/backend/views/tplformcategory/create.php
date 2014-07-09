<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\TplFormCategory $model
 */

$this->title = 'Create Tpl Form Category';
$this->params['breadcrumbs'][] = ['label' => 'Tpl Form Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tpl-form-category-create">

	<h1><?= Html::encode($this->title) ?></h1>

	<?php echo $this->render('_form', [
		'model' => $model,
	]); ?>

</div>

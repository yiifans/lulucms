<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\TplListCategory $model
 */

$this->title = 'Create Tpl List Category';
$this->params['breadcrumbs'][] = ['label' => 'Tpl List Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tpl-list-category-create">

	<h1><?= Html::encode($this->title) ?></h1>

	<?php echo $this->render('_form', [
		'model' => $model,
	]); ?>

</div>

<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\TplItemCategory $model
 */

$this->title = 'Create Tpl Item Category';
$this->params['breadcrumbs'][] = ['label' => 'Tpl Item Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tpl-item-category-create">

	<h1><?= Html::encode($this->title) ?></h1>

	<?php echo $this->render('_form', [
		'model' => $model,
	]); ?>

</div>

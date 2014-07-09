<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Catalog $model
 */

$this->title = 'Create Catalog';
$this->params['breadcrumbs'][] = ['label' => 'Catalogs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="catalog-create">

	<h1><?= Html::encode($this->title) ?></h1>

	<?php echo $this->render('_form', [
		'model' => $model,
		'treeList' => $treeList,
		'modelList' => $modelList,
	]); ?>

</div>

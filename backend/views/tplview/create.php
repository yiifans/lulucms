<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\TplView $model
 */

$this->title = 'Create Tpl View';
$this->params['breadcrumbs'][] = ['label' => 'Tpl Views', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tpl-view-create">

	<h1><?= Html::encode($this->title) ?></h1>

	<?php echo $this->render('_form', [
		'model' => $model,
		'tableList' => $tableList,
		'tplViewCategoryList'=>$tplViewCategoryList,
	]); ?>

</div>

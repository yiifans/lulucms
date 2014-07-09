<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\TplCover $model
 */

$this->title = 'Create Tpl Cover';
$this->params['breadcrumbs'][] = ['label' => 'Tpl Covers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tpl-cover-create">

	<h1><?= Html::encode($this->title) ?></h1>

	<?php echo $this->render('_form', [
		'model' => $model,
		'tableList' => $tableList,
		'tplCoverCategoryList' => $tplCoverCategoryList,
	]); ?>

</div>

<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\TplList $model
 */

$this->title = 'Create Tpl List';
$this->params['breadcrumbs'][] = ['label' => 'Tpl Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tpl-list-create">

	<h1><?= Html::encode($this->title) ?></h1>

	<?php echo $this->render('_form', [
		'model' => $model,
		'tableList' => $tableList,
		'tplListCategoryList' => $tplListCategoryList,
	]); ?>

</div>

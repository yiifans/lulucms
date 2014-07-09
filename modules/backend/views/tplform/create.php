<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\TplForm $model
 */

$this->title = 'Create Tpl Form';
$this->params['breadcrumbs'][] = ['label' => 'Tpl Forms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tpl-form-create">

	<h1><?= Html::encode($this->title) ?></h1>

	<?php echo $this->render('_form', [
		'model' => $model,
		'tplFormCategoryList'=>$tplFormCategoryList,
		'tableList' => $tableList,
	]); ?>

</div>

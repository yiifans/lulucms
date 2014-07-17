<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\TplItem $model
 */

$this->title = 'Create Tpl Item';
$this->params['breadcrumbs'][] = ['label' => 'Tpl Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tpl-item-create">

	<h1><?= Html::encode($this->title) ?></h1>

	<?php echo $this->render('_form', [
		'model' => $model,
		'modelList' => $modelList,
		'tplItemCategoryList' => $tplItemCategoryList,
	]); ?>

</div>

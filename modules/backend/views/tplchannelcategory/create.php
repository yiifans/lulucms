<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\TplCoverCategory $model
 */

$this->title = 'Create Tpl Cover Category';
$this->params['breadcrumbs'][] = ['label' => 'Tpl Cover Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tpl-cover-category-create">

	<h1><?= Html::encode($this->title) ?></h1>

	<?php echo $this->render('_form', [
		'model' => $model,
	]); ?>

</div>

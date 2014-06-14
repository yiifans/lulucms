<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\DefineTableField $model
 */

$this->title = '新建字段';
$this->params['breadcrumbs'][] = ['label' => '字段管理', 'url' => ['index','tb'=>$table]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="define-table-field-create">

	<h1><?= Html::encode($this->title) ?></h1>

	<?php echo $this->render('_form', [
		'model' => $model,
		
	]); ?>

</div>

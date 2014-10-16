<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\DefineTable $model
 */

$this->title = '修改模型: ' . $model->name;
$this->addBreadcrumb('内容模型',['index']);
$this->addBreadcrumb($this->title);

?>
<div class="define-table-update">

	<?php echo $this->render('_form', [
		'model' => $model,
	]); ?>

</div>

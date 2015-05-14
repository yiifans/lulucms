<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\DefineTable $model
 */

$this->title = '新建模型';
$this->addBreadcrumb('内容模型',['index']);
$this->addBreadcrumb($this->title);

?>
<div class="define-table-create">

	<?php echo $this->render('_form', [
		'model' => $model,
	]); ?>

</div>

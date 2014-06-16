<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\DefineTableField $model
 */

$this->title = '新建字段：'.$table;
$this->addBreadcrumb('内容模型',['definetable/index']);
$this->addBreadcrumb('字段管理',['index','tb'=>$table]);
$this->addBreadcrumb($this->title);

// $this->params['breadcrumbs'][] = ['label' => '字段管理', 'url' => ['index','tb'=>$table]];
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="define-table-field-create">

	<?php echo $this->render('_form', [
		'model' => $model,
		
	]); ?>

</div>

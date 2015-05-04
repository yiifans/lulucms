<?php
use yii\helpers\Html;

/**
 *
 * @var yii\web\View $this
 * @var app\models\DefineTableField $model
 */

$this->title = '修改字段';
$this->addBreadcrumb('内容模型(' . $table . ')', ['define-table/index']);
$this->addBreadcrumb('字段管理', ['index', 'tb' => $table]);
$this->addBreadcrumb($this->title);

?>
<div class="define-table-field-update">
	<?php echo $this->render('_form', [
		'model' => $model,
	]); ?>

</div>

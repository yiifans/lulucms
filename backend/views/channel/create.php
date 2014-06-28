<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Catalog $model
 */

$this->title = '新建频道';
$this->addBreadcrumb('频道管理',['index']);
$this->addBreadcrumb($this->title);

?>
<div class="catalog-create">

	<?php echo $this->render('_form', [
		'model' => $model,
		'tableList' => $tableList,
		'channelTpls' =>$channelTpls,
		'listTpls'=>$listTpls,
		'detailTpls'=>$detailTpls,
	]); ?>

</div>

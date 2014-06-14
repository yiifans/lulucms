<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Catalog $model
 */

$this->title = '新建频道';
$this->params['breadcrumbs'][] = ['label' => '频道管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="catalog-create">

	<h1><?= Html::encode($this->title) ?></h1>

	<?php echo $this->render('_form', [
		'model' => $model,
		'channelArrayTree' => $channelArrayTree,
		'tableList' => $tableList,
		'channelTpls' =>$channelTpls,
		'listTpls'=>$listTpls,
		'detailTpls'=>$detailTpls,
	]); ?>

</div>

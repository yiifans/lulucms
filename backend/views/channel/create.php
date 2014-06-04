<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Catalog $model
 */

$this->title = 'Create Channel';
$this->params['breadcrumbs'][] = ['label' => 'Channel', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="catalog-create">

	<h1><?= Html::encode($this->title) ?></h1>

	<?php echo $this->render('_form', [
		'model' => $model,
		'channelTree' => $channelTree,
		'tableList' => $tableList,
		'tplChannelList' =>$tplChannelList,
		'tplListList'=>$tplListList,
		'tplViewList'=>$tplViewList,
	]); ?>

</div>

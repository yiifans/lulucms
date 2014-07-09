<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var common\models\search\TplItemSearch $searchModel
 */

$this->title = 'Tpl Items';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tpl-item-index">

	<h1><?= Html::encode($this->title) ?></h1>

	<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

	<p>
		<?= Html::a('Create TplItem', ['create'], ['class' => 'btn btn-success']) ?>
	</p>

	<?php echo GridView::widget([
		'dataProvider' => $dataProvider,
		'filterModel' => $searchModel,
		'columns' => [
			['class' => 'yii\grid\SerialColumn'],

			'id',
			'category_id',
			'model_id',
			'name',
			'file_path',
			// 'file_name',
			// 'file_content',
			// 'create_time',
			// 'modify_time',
			// 'note',

			['class' => 'yii\grid\ActionColumn'],
		],
	]); ?>

</div>

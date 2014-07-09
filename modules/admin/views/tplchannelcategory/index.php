<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var common\models\search\TplCoverCategorySearch $searchModel
 */

$this->title = 'Tpl Conver Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tpl-cover-category-index">

	<h1><?= Html::encode($this->title) ?></h1>

	<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

	<p>
		<?= Html::a('Create TplCoverCategory', ['create'], ['class' => 'btn btn-success']) ?>
	</p>

	<?php echo GridView::widget([
		'dataProvider' => $dataProvider,
		'filterModel' => $searchModel,
		'columns' => [
			['class' => 'yii\grid\SerialColumn'],

			'id',
			'name',
			'note',

			['class' => 'yii\grid\ActionColumn'],
		],
	]); ?>

</div>

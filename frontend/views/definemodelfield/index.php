<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\models\search\DefineModelFieldSearch $searchModel
 */

$this->title = 'Define Model Fields';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="define-model-field-index">

	<h1><?= Html::encode($this->title) ?></h1>

	<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

	<p>
		<?= Html::a('Create DefineModelField', ['create'], ['class' => 'btn btn-success']) ?>
	</p>

	<?php echo GridView::widget([
		'dataProvider' => $dataProvider,
		'filterModel' => $searchModel,
		'columns' => [
			['class' => 'yii\grid\SerialColumn'],

			'id',
			'model_id',
			'lable',
			'name',
			'type',
			// 'length',
			// 'sort_num',
			// 'front_fun_add',
			// 'front_fun_update',
			// 'front_fun_show',
			// 'front_form_type',
			// 'front_form_option',
			// 'front_form_default',
			// 'front_form_html',
			// 'back_fun_add',
			// 'back_fun_update',
			// 'back_fun_show',
			// 'back_form_type',
			// 'back_form_option',
			// 'back_form_default',
			// 'back_form_html',

			['class' => 'yii\grid\ActionColumn'],
		],
	]); ?>

</div>

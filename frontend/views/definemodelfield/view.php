<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var app\models\DefineModelField $model
 */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Define Model Fields', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="define-model-field-view">

	<h1><?= Html::encode($this->title) ?></h1>

	<p>
		<?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
		<?php echo Html::a('Delete', ['delete', 'id' => $model->id], [
			'class' => 'btn btn-danger',
			'data-confirm' => Yii::t('app', 'Are you sure to delete this item?'),
			'data-method' => 'post',
		]); ?>
	</p>

	<?php echo DetailView::widget([
		'model' => $model,
		'attributes' => [
			'id',
			'model_id',
			'lable',
			'name',
			'type',
			'length',
			'sort_num',
			'front_fun_add',
			'front_fun_update',
			'front_fun_show',
			'front_form_type',
			'front_form_option',
			'front_form_default',
			'front_form_html',
			'back_fun_add',
			'back_fun_update',
			'back_fun_show',
			'back_form_type',
			'back_form_option',
			'back_form_default',
			'back_form_html',
		],
	]); ?>

</div>

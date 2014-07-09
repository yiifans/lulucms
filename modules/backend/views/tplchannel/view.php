<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var common\models\TplCover $model
 */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Tpl Covers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tpl-conver-view">

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
			'category_id',
			'model_id',
			'name',
			'file_path',
			'file_name',
			'file_content',
			'create_time',
			'modify_time',
			'note',
		],
	]); ?>

</div>

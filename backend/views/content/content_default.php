<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var app\models\Catalog $model
 */

$this->title = '';
$this->params['breadcrumbs'][] = ['label' => 'Catalogs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="catalog-view">

	<h1><?= Html::encode($this->title) ?></h1>

	<p>
		
	</p>

	<p><?php echo $model['id'] ?></p>

	<p><?php echo $model['title'] ?></p>
	<p><?php echo $model['id'] ?></p>
	<p><?php echo $model['id'] ?></p>
	<p><?php echo $model['id'] ?></p>
</div>

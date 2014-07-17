<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var app\models\Catalog $model
 */

$this->title = $model['title'];
$this->buildBreadcrumbs($chnid);
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-detail">

	<h1><?= Html::encode($this->title) ?></h1>

	<table class="table">
		<tr>
			<th width="120px">名称</th>
			<th>值</th>
		</tr>
	
		<?php 
			foreach ($model as $name=>$value)
			{
				echo '<tr><td>'.$name.'</td><td>'.$value.'</td></tr>';
			}
		?>
	</table>
	
	
</div>

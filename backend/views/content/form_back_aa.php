<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\Catalog $model
 */

$this->title = 'Create '.$channelModel->name;
$this->params['breadcrumbs'][] = ['label' => 'Goods(Clothing)', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-create">

	<h1><?= Html::encode($this->title) ?></h1>

<div class="content-form">

	<?php $form = ActiveForm::begin(); ?>
	<input type="hidden" id="content-channel_id" name="Content[channel_id]" value="<?php echo $chnid?>"/>
<table width="100%">
<tr>
<td width="120px">title</td>
<td><input type="text" id="content-title" class="form-control" name="Content[title]"/></td>
</tr>


<tr>
<td>title_pic</td>
<td><input type="text" id="content-title_pic" class="form-control" name="Content[title_pic]"/></td>
</tr>

<tr>
<td>content</td>
<td><textarea  id="content-content" class="form-control" name="Content[content]" rows="6" ></textarea></td>
</tr>

<tr>
<td>username</td>
<td><input type="text" id="content-username" class="form-control" name="Content[username]"/></td>
</tr>

<tr>
<td>note</td>
<td><input type="text" id="content-note" class="form-control" name="Content[note]"/></td>
</tr>

<tr>
<td>price</td>
<td><input type="text" id="content-price" class="form-control" name="Content[price]"/></td>
</tr>

<tr>
<td>weight</td>
<td><input type="text" id="content-weight" class="form-control" name="Content[weight]"/></td>
</tr>

</table>
		
	

		<div class="form-group">
			<?= Html::submitButton( 'Create' , ['class' =>  'btn btn-primary']) ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>
	


</div>

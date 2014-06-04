<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\Catalog $model
 * @var yii\widgets\ActiveForm $form
 */

?>

<div class="catalog-form">

	<?php $form = ActiveForm::begin(); ?>
	<input type="hidden" id="content-catalog_id" name="Content[catalog_id]" value="<?php echo $catid?>"/>
<table>
<tr>
<td>title</td>
<td><input type="text" id="content-title" class="form-control" name="Content[title]"/></td>
</tr>


<tr>
<td>title_pic</td>
<td><input type="text" id="content-title_pic" class="form-control" name="Content[title_pic]"/></td>
</tr>
<tr>
<td>username</td>
<td><input type="text" id="content-username" class="form-control" name="Content[username]"/></td>
</tr>
<tr>
<td>note</td>
<td><input type="text" id="content-note" class="form-control" name="Content[note]"/></td>
</tr>
</table>
		
	

		<div class="form-group">
			<?= Html::submitButton( 'Create' , ['class' =>  'btn btn-primary']) ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;

use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/**
 * @var yii\web\View $this
 * @var common\models\TplForm $model
 */

$this->title = '编辑模板';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tpl-form-update">

<a href="/index.php?r=tpl/index">返回</a>
<a href="index.php?r=tpl/index&d=.">返回上一层</a>

	<h1><?= Html::encode($this->title) ?></h1>

	<?php echo $file;?>
	<?php $form = ActiveForm::begin(); ?>

		<textarea id="FileContent" name="FileContent" rows="5" style="width:90%; height:400px"><?php echo $content;?></textarea>


		<div class="form-group">
			<?= Html::submitButton($isNewRecord ? 'Create' : 'Update', ['class' => $isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		</div>

	<?php ActiveForm::end(); ?>
	
	
	

</div>

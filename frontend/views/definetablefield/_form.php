<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\DefineTableField $model
 * @var yii\widgets\ActiveForm $form
 */


$fieldTypes=[
			/*
			 'VARCHAR'=>'字符型0-255字节(VARCHAR)',
			'CHAR'=>'定长字符型0-255字节(CHAR)',
			'TEXT'=>'小型字符型(TEXT)',
			'MEDIUMTEXT'=>'中型字符型(MEDIUMTEXT)',
			'LONGTEXT'=>'大型字符型(LONGTEXT)',
			'TINYINT'=>'小数值型(TINYINT)',
			'SMALLINT'=>'中数值型(SMALLINT)',
			'INT'=>'大数值型(INT)',
			'BIGINT'=>'超大数值型(BIGINT)',
			'FLOAT'=>'数值浮点型(FLOAT)',
			'DOUBLE'=>'数值双精度型(DOUBLE)',
			'DATE'=>'日期型(DATE)',
			'DATETIME'=>'日期时间型(DATETIME)'
			*/
			
			'VARCHAR'=>'VARCHAR',
			'CHAR'=>'CHAR',
			'TEXT'=>'TEXT',
			'MEDIUMTEXT'=>'MEDIUMTEXT',
			'LONGTEXT'=>'LONGTEXT',
			'TINYINT'=>'TINYINT',
			'SMALLINT'=>'SMALLINT',
			'INT'=>'INT',
			'BIGINT'=>'BIGINT',
			'FLOAT'=>'FLOAT',
			'DOUBLE'=>'DOUBLE',
			'DATE'=>'DATE',
			'DATETIME'=>'DATETIME'
		];
?>

<div class="define-table-field-form">

	<?php $form = ActiveForm::begin(); ?>


		<?= $form->field($model, 'label')->textInput(['maxlength' => 80]) ?>

		<?= $form->field($model, 'name')->textInput(['maxlength' => 80]) ?>

		<!--<?= $form->field($model, 'type')->textInput(['maxlength' => 80]) ?>-->

		<?= $form->field($model, 'type')->dropDownList($fieldTypes) ?>
		
		<?= $form->field($model, 'length')->textInput() ?>

		<?= $form->field($model, 'sort_num')->textInput() ?>

		<?= $form->field($model, 'note')->textInput(['maxlength' => 200]) ?>

		<div class="form-group">
			<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>

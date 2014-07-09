<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;

$this->registerCssFile('libs/kindeditor/themes/default/default.css');
$this->registerJsFile('libs/kindeditor/kindeditor-min.js');
$this->registerJsFile('libs/kindeditor/lang/zh_CN.js');

$js=<<<JS
			var editor;
			KindEditor.ready(function(K) {
				editor = K.create('#content-content', {
					allowFileManager : true
				});
			});
JS;

$this->registerJs($js,View::POS_END);

?>

<?php echo $field->getEditorForm($value,true);?>

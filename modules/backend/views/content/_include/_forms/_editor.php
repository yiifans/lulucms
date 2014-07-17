<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;
use common\includes\FieldUtility;

$this->registerCssFile('static/common/libs/kindeditor/themes/default/default.css');
$this->registerJsFile('static/common/libs/kindeditor/kindeditor-min.js');
$this->registerJsFile('static/common/libs/kindeditor/lang/zh_CN.js');

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

<?php echo FieldUtility::editorForm($field,$value);?>

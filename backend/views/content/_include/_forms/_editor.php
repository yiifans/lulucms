<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;
use common\includes\FieldUtility;
use components\widgets\KindEditor;

?>

<?php echo FieldUtility::editorForm($field,$value);?>

<?php
$inputId = FieldUtility::getInputId($field, []);
KindEditor::widget(['id' => $inputId]);

?>

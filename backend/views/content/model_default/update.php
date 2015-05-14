<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\Catalog $model
 */

$this->title = '修改内容';
$this->addBreadcrumb('内容管理('.$currentChannel['name'].')',['index','chnid'=>$chnid]);
$this->addBreadcrumb($this->title);

?>
<div class="content-create">

 <?php echo $this->render('_form', [
		'model' => $model,
		'chnid'=>$chnid,
		'currentChannel' => $currentChannel,
		'fields' => $fields,
		]);
	?>

</div>

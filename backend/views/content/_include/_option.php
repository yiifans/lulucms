<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;
use common\models\config\Config;
use common\includes\CommonUtility;

/**
 * @var yii\web\View $this
 * @var app\models\Content $model
 * @var yii\widgets\ActiveForm $form
 */

$this->registerJsFile('static/common/js/common.js');


?>
  

    <?= $form->field($model, 'sub_title')->textInput(['maxlength' => 128]) ?>

    <?= $form->field($model, 'summary')->textarea(['rows' => 5]) ?>
    
    <?= $form->field($model, 'keywords')->textInput(['maxlength' => 128]) ?>
    
    <?= $form->field($model, 'commonts')->textInput(['maxlength' => 128]) ?>

    <?= $form->field($model, 'views')->textInput(['maxlength' => 128]) ?>

    <?= $form->field($model, 'publish_time')->textInput(['maxlength' => 128]) ?>
    
    <?= $form->field($model, 'modify_time')->textInput(['maxlength' => 128]) ?>
    
    <?= $form->field($model, 'status')->dropDownList(CommonUtility::getStatus()) ?>
    


	

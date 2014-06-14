<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\models\search\DefineTableFieldSearch $searchModel
 */

$this->title = 'Define Table Fields';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="define-table-field-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Define Table Field', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'table',
            'name',
            'name_en',
            'type',
            // 'length',
            // 'is_null',
            // 'is_main',
            // 'is_sys',
            // 'sort_num',
            // 'note',
            // 'front_status',
            // 'front_fun_add',
            // 'front_fun_update',
            // 'front_fun_show',
            // 'front_form_type',
            // 'front_form_option',
            // 'front_form_default',
            // 'front_form_source',
            // 'front_form_html',
            // 'front_note',
            // 'back_status',
            // 'back_fun_add',
            // 'back_fun_update',
            // 'back_fun_show',
            // 'back_form_type',
            // 'back_form_option',
            // 'back_form_default',
            // 'back_form_source',
            // 'back_form_html',
            // 'back_note',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

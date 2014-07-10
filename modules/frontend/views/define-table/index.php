<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\models\search\DefineTable $searchModel
 */

$this->title = 'Define Tables';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="define-table-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Define Table', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            'name_en',
            'description',
            'is_default',
            'channel_tpl',
            // 'list_tpl',
            // 'detail_tpl',
            // 'back_form_tpl',
            // 'back_action_index',
            // 'back_action_create',
            // 'back_action_update',
            // 'back_action_delete',
            // 'back_action_other',
            // 'front_form_tpl',
            // 'front_action_index',
            // 'front_action_create',
            // 'front_action_update',
            // 'front_action_delete',
            // 'front_action_other',
            // 'note',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

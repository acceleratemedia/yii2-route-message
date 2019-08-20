<?php

use bvb\routealert\backend\helpers\RouteAlertHelper;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $search_model backend\models\RouteAlert */
/* @var $data_provider yii\data\ActiveDataProvider */

$this->title = 'Route Alerts';

$applicationsList = RouteAlertHelper::getApplicationsList();
?>
<div class="route-alert-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Route Alert', ['create/'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'app_id',
                'value' => function($model) use($applicationsList){
                    return $applicationsList[$model->app_id];
                }
            ],
            'route',
            [
                'attribute' => 'frequency',
                'value' => function($model){
                    echo RouteAlertHelper::$defaultFrequencyList[$model->frequency];
                },
                'filter' => RouteAlertHelper::$defaultFrequencyList
            ],
            'css_class',
            'active:boolean',
            'message',

            [
                'class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'delete' => function($url, $model, $key){
                        return Html::a('<i class="fas fa-trash"></i>', ['delete/', 'id'=>$model->id], ['data-method'=>'post', 'data-confirm' => 'Are you sure you want to delete this route alert?']);
                    },
                    'update' => function($url, $model, $key){
                        return Html::a('<i class="fas fa-edit"></i>', ['update/', 'id'=>$model->id]);
                    }
                ],
                'template' => '{update} {delete}'
            ],
        ],
    ]); ?>

</div>

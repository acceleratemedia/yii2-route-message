<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model bvb\routealert\backend\models\RouteAlert */

$this->title = 'Update Route Alert';
?>
<div class="route-alert-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('../_form', [
        'model' => $model,
    ]) ?>

</div>

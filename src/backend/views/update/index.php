<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model bvb\routemessage\backend\models\RouteMessage */

$this->title = 'Update Route Alert';
?>
<div class="route-message-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('../_form', [
        'model' => $model,
    ]) ?>

</div>

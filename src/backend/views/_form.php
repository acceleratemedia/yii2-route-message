<?php

use bvb\routealert\backend\helpers\Helper;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model bvb\routealert\backend\models\RouteAlert */
/* @var $form yii\bootstrap\ActiveForm */

$applicationsList = Helper::getApplicationsList();
?>

<div class="route-alert-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'app_id')->dropdownList($applicationsList); ?>

    <?= $form->field($model, 'route')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'query_string')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'message')->textarea() ?>

    <?= $form->field($model, 'active')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use bvb\routealert\backend\helpers\RouteAlertHelper;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model bvb\routealert\backend\models\RouteAlert */
/* @var $form yii\bootstrap\ActiveForm */

$applicationsList = RouteAlertHelper::getApplicationsList();
?>

<div class="route-alert-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'app_id')->dropdownList($applicationsList); ?>

    <?= $form->field($model, 'route')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'frequency')->dropdownList(RouteAlertHelper::$defaultFrequencyList) ?>

    <?= $form->field($model, 'css_class')->textInput(['maxlength' => true]) ?>

    <label for="route-alert-message">Message</label>
    <div class="redactor-container" id="redactor-message-container">
        <?= $form->field($model, 'message', ['template' => "{input}\n{hint}\n{error}"])
            ->widget(\yii\redactor\widgets\Redactor::className(), [
                'clientOptions' => [
                    'toolbarFixedTarget' => '#redactor-message-container',
                    'replaceDivs' => false
                ]
        ]) ?>
    </div>

    <?= $form->field($model, 'active')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <a class="btn btn-info preview-btn">Preview</a>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php
// --- Render the modal dialog for the preview
echo $this->render('@bvb-route-alert/frontend/widgets/views/modal');

$ready_js = <<<'JAVASCRIPT'
$("body").on("click", ".preview-btn", function(e){
    $("#route-alert-modal .modal-content").html($('#routealert-message').redactor("code.get"));
    $("#route-alert-modal").addClass($("#routealert-css_class").val());
    $("#route-alert-modal").modal("show");
})

JAVASCRIPT;
$this->registerJs($ready_js);
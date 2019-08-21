<?php

use bvb\routemessage\backend\helpers\RouteMessageHelper;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model bvb\routemessage\backend\models\RouteMessage */
/* @var $form yii\bootstrap\ActiveForm */

$applicationsList = RouteMessageHelper::getApplicationsList();
?>

<div class="route-message-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'app_id')->dropdownList($applicationsList); ?>

    <?= $form->field($model, 'route')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'frequency')->dropdownList(RouteMessageHelper::$defaultFrequencyList) ?>

    <?= $form->field($model, 'css_class')->textInput(['maxlength' => true]) ?>

    <label for="route-message-message">Message</label>
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
echo $this->render('@bvb-route-message/frontend/widgets/views/modal');

$ready_js = <<<'JAVASCRIPT'
$("body").on("click", ".preview-btn", function(e){
    $("#route-message-modal .modal-content").html($('#routemessage-message').redactor("code.get"));
    $("#route-message-modal .modal-dialog").addClass($("#routemessage-css_class").val());
    $("#route-message-modal").modal("show");
})

$("#route-message-modal").on("hidden.bs.modal", function(e){
    $("#route-message-modal .modal-dialog").removeClass($("#routemessage-css_class").val());
});
JAVASCRIPT;
$this->registerJs($ready_js);
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\grnti */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="grnti-form">

    <?php $form = ActiveForm::begin(); ?>

    <?//= $form->field($model, 'grnti_id')->textInput() ?>

    <?= $form->field($model, 'grnti_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'grnti_name')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'grnti_parent_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

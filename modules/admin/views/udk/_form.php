<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Udk */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="udk-form">

    <?php $form = ActiveForm::begin(); ?>

    <?//= $form->field($model, 'udk_id')->textInput() ?>

    <?= $form->field($model, 'udk_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'udk_name')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'udk_parent_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

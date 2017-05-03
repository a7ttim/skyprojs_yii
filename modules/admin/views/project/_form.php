<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\project */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="project-form">


    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'project_name')->textInput(['maxlength' => true]) ?>

    <? /* $form->field($model, 'project_date')->widget(
        DatePicker::className(), [
        // inline too, not bad
        'inline' => true,
        // modify template for custom rendering
        'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'dd-M-yyyy'
        ]
    ]);  */
    ?>

    <?= $form->field($model, 'project_date')->textInput(['readonly' => true, 'value' => date('Y-m-d')]) ?>

    <?= $form->field($model, 'project_area')->textarea(['maxlength' => true]) ?>

    <?= $form->field($model, 'project_advantages')->textarea(['maxlength' => true]) ?>

    <?= $form->field($model, 'project_specifications')->textarea(['maxlength' => true]) ?>

    <?= $form->field($model, 'project_consumers')->textarea(['maxlength' => true]) ?>

    <?= $form->field($model, 'project_protection')->textarea(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\project */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="project-form">


    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'project_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'project_date')->textInput(['readonly' => true, 'value' => date('Y-m-d')]) ?>

    <? // Without model and implementing a multiple select
    echo '<label class="control-label">Provinces</label>';
    echo Select2::widget([
        'name' => 'state_10',
        'data' => \app\models\Udk::find()->all(),
        'options' => [
            'placeholder' => 'Select provinces ...',
            'multiple' => true
        ],
    ]);
    ?>

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

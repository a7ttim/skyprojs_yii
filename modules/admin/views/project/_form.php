<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\project */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="project-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'project_id')->textInput() ?>

    <?= $form->field($model, 'project_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'project_date')->textInput() ?>

    <?= $form->field($model, 'project_area')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'project_advantages')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'project_specifications')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'project_consumers')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'project_protection')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

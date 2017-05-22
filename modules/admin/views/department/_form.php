<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Department;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\department */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="department-form">

    <?php $form = ActiveForm::begin(); ?>

    <?//= $form->field($model, 'department_id')->textInput() ?>

    <?= $form->field($model, 'department_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'department_parent_id')->widget(Select2::classname(), [
        'language' => 'ru',
        'data' => \yii\helpers\ArrayHelper::map(Department::find()->where('department_id != :department_id', ['department_id' => $model->department_id > 0 ? $model->department_id : 0])->all(), 'department_id', 'department_name'),
        'options' => ['placeholder' => 'Выбрать Подразделение ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label('Родительское подразделение');
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Создать') : Yii::t('app', 'Изменить'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

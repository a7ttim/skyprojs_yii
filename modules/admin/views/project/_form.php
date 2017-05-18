<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use kartik\select2\Select2;
use app\models\Udk;

/* @var $this yii\web\View */
/* @var $model app\models\project */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="project-form">


    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'project_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'project_date')->textInput(['readonly' => true, 'value' => date('Y-m-d')]) ?>

    <?= $form->field($model, 'udks_array')->widget(Select2::classname(), [
        'attribute' => 'udks',
        'language' => 'ru',
        'data' => \yii\helpers\ArrayHelper::map(Udk::find()->all(), 'udk_id', 'udk_code'),
        'options' => ['placeholder' => 'Выбрать УДК ...', 'multiple' => true],
        'pluginOptions' => [
            'tokenSeparators' => [',', ' '],
            'maximumInputLength' => 10
        ],
    ])->label('УДК');
    ?>

    <?= $form->field($model, 'grntis_array')->widget(Select2::classname(), [
        'attribute' => 'grntis',
        'language' => 'ru',
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Grnti::find()->all(), 'grnti_id', 'grnti_code'),
        'options' => ['placeholder' => 'Выбрать ГРНТИ ...', 'multiple' => true],
        'pluginOptions' => [
            'tokenSeparators' => [',', ' '],
            'maximumInputLength' => 10
        ],
    ])->label('ГРНТИ');
    ?>

    <?= $form->field($model, 'directions_array')->widget(Select2::classname(), [
        'attribute' => 'directions',
        'language' => 'ru',
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Directions::find()->all(), 'direction_id', 'direction_name'),
        'options' => ['placeholder' => 'Выбрать направление ...', 'multiple' => true],
        'pluginOptions' => [
            'tokenSeparators' => [',', ' '],
            'maximumInputLength' => 10
        ],
    ])->label('Направления');
    ?>

    <?= $form->field($model, 'departments_array')->widget(Select2::classname(), [
        'attribute' => 'departments',
        'language' => 'ru',
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Department::find()->all(), 'department_id', 'department_name'),
        'options' => ['placeholder' => 'Выбрать подразделение ...', 'multiple' => true],
        'pluginOptions' => [
            'tokenSeparators' => [',', ' '],
            'maximumInputLength' => 10
        ],
    ])->label('Подразделения');
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

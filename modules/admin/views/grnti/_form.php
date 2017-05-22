<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use app\models\Grnti;

/* @var $this yii\web\View */
/* @var $model app\models\grnti */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="grnti-form">

    <?php $form = ActiveForm::begin(); ?>

    <?//= $form->field($model, 'grnti_id')->textInput() ?>

    <?= $form->field($model, 'grnti_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'grnti_name')->textarea(['rows' => 6]) ?>

    <?//= $form->field($model, 'grnti_parent_id')->textInput() ?>

    <?= $form->field($model, 'grnti_parent_id')->widget(Select2::classname(), [
        'language' => 'ru',
        'data' => \yii\helpers\ArrayHelper::map(Grnti::find()->where('grnti_id != :grnti_id', ['grnti_id' => $model->grnti_id > 0 ? $model->grnti_id : 0])->all(), 'grnti_id', 'grnti_code'),
        'options' => ['placeholder' => 'Выбрать ГРНТИ ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label('Родительский ГРНТИ'); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Создать') : Yii::t('app', 'Изменить'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

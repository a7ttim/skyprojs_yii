<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Udk;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Udk */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="udk-form">

    <?php $form = ActiveForm::begin(); ?>

    <?//= $form->field($model, 'udk_id')->textInput() ?>

    <?= $form->field($model, 'udk_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'udk_name')->textarea(['rows' => 6]) ?>

    <?//= $form->field($model, 'udk_parent_id')->textInput() ?>

    <?= $form->field($model, 'udk_parent_id')->widget(Select2::classname(), [
        'language' => 'ru',
        'data' => \yii\helpers\ArrayHelper::map(Udk::find()->where('udk_id != :udk_id', ['udk_id' => $model->udk_id > 0 ? $model->udk_id : 0])->all(), 'udk_id', 'udk_code'),
        'options' => ['placeholder' => 'Выбрать УДК ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label('Родительский УДК');
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Создать') : Yii::t('app', 'Изменить'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

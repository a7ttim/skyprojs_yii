<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ProjectAdd */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$form = ActiveForm::begin(['id' => 'ProjectAdd'], ['options' => ['enctype' => 'multipart/form-data']]) ?>

<h1>
    <?=
    $name
    ?>
</h1>

<?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

<?= $form->field($model, 'definition')->textarea(['rows' => 6]) ?>

<?= $form->field($model, 'file')->fileInput() ?>

<?= Html::submitButton();?>

<?php ActiveForm::end(); ?>

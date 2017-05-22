<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\grnti */

$this->title = Yii::t('app', 'Изменить ГРНТИ: ', [
    'modelClass' => 'Grnti',
]) . $model->grnti_code;
$this->params['breadcrumbs'][] = ['label' => 'Панель управления', 'url' => ['/admin']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'ГРНТИ'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->grnti_code, 'url' => ['view', 'id' => $model->grnti_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Изменить');
?>
<div class="grnti-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

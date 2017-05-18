<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\grnti */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Grnti',
]) . $model->grnti_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Grntis'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->grnti_id, 'url' => ['view', 'id' => $model->grnti_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="grnti-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

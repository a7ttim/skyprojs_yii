<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Udk */

$this->title = 'Update Udk: ' . $model->udk_id;
$this->params['breadcrumbs'][] = ['label' => 'Udks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->udk_id, 'url' => ['view', 'id' => $model->udk_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="udk-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Udk */

$this->title = 'Изменить УДК: ' . $model->udk_code;
$this->params['breadcrumbs'][] = ['label' => 'УДК', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->udk_code, 'url' => ['view', 'id' => $model->udk_id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="udk-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

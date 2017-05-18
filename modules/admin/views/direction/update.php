<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\directions */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Directions',
]) . $model->direction_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Directions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->direction_id, 'url' => ['view', 'id' => $model->direction_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="directions-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\grnti */

$this->title = $model->grnti_code;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'ГРНТИ'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="grnti-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Изменить'), ['update', 'id' => $model->grnti_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Удалить'), ['delete', 'id' => $model->grnti_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Вы уверены?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'grnti_id',
            'grnti_code',
            'grnti_name:ntext',
            //'grnti_parent_id',
            'grnti_parent.grnti_code',
        ],
    ]) ?>

</div>

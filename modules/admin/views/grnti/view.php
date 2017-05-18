<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\grnti */

$this->title = $model->grnti_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Grntis'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="grnti-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->grnti_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->grnti_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
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
            'grnti_parent_id',
        ],
    ]) ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Udk;
/* @var $this yii\web\View */
/* @var $model app\models\Udk */

$this->title = $model->udk_code;
$this->params['breadcrumbs'][] = ['label' => 'УДК', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="udk-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->udk_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->udk_id], [
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
            'udk_id',
            'udk_code',
            'udk_name:ntext',
            'udk.udk_code',
        ],
    ]) ?>

</div>

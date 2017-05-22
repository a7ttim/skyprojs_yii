<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\Udk;
use \yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UdkSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'УДК';
$this->params['breadcrumbs'][] = ['label' => 'Панель управления', 'url' => ['/admin']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="udk-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать УДК', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'udk_id',
            'udk_code',
            'udk_name:ntext',
            //'udk_parent_id',
            [
                'attribute' => 'udk_parent_id',
                'value' => 'udk.udk_code',
            ],

            //['class' => 'yii\grid\ActionColumn'],
            [
                'value' => function (Udk $udk) {
                    return Html::a('<span class="fa fa-search"></span>открыть', Url::to(['view', 'id' => $udk->udk_id]), [
                        'title' => Yii::t('app', 'открыть'),
                        'class' =>'btn btn-info btn-xs',
                    ]);
                },
                'headerOptions' => ['style' => 'width:10px'],
                'format' => 'raw',
            ],
            [
                'value' => function (Udk $udk) {
                    return Html::a('<span class="fa fa-search"></span>изменить', Url::to(['update', 'id' => $udk->udk_id]), [
                        'title' => Yii::t('app', 'изменить'),
                        'class' =>'btn btn-primary btn-xs',
                    ]);
                },
                'headerOptions' => ['style' => 'width:10px'],
                'format' => 'raw',
            ],
            [
                'value' => function (Udk $udk) {
                    return Html::a('<span class="fa fa-search"></span>удалить', Url::to(['delete', 'id' => $udk->udk_id]), [
                        'title' => Yii::t('app', 'удалить'),
                        'class' =>'btn btn-danger btn-xs',
                        'data'=>['method' => 'post'],
                    ]);
                },
                'headerOptions' => ['style' => 'width:10px'],
                'format' => 'raw',
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>

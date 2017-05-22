<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\Grnti;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\GrntiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'ГРНТИ');
$this->params['breadcrumbs'][] = ['label' => 'Панель управления', 'url' => ['/admin']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="grnti-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Создать ГРНТИ'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'grnti_code',
            'grnti_name:ntext',
            [
                'attribute' => 'grnti_parent_id',
                'value' => 'grnti_parent.grnti_code',
            ],

            //['class' => 'yii\grid\ActionColumn'],
            [
                'value' => function (Grnti $grnti) {
                    return Html::a('<span class="fa fa-search"></span>открыть', Url::to(['view', 'id' => $grnti->grnti_id]), [
                        'title' => Yii::t('app', 'открыть'),
                        'class' =>'btn btn-info btn-xs',
                    ]);
                },
                'headerOptions' => ['style' => 'width:10px'],
                'format' => 'raw',
            ],
            [
                'value' => function (Grnti $grnti) {
                    return Html::a('<span class="fa fa-search"></span>изменить', Url::to(['update', 'id' => $grnti->grnti_id]), [
                        'title' => Yii::t('app', 'изменить'),
                        'class' =>'btn btn-primary btn-xs',
                    ]);
                },
                'headerOptions' => ['style' => 'width:10px'],
                'format' => 'raw',
            ],
            [
                'value' => function (Grnti $grnti) {
                    return Html::a('<span class="fa fa-search"></span>удалить', Url::to(['delete', 'id' => $grnti->grnti_id]), [
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
<?php Pjax::end(); ?></div>

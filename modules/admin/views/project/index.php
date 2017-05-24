<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\StringHelper;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\Project;
/* @var $this yii\web\View */
/* @var $searchModel app\models\projectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Проекты';
$this->params['breadcrumbs'][] = ['label' => 'Панель управления', 'url' => ['/admin']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Создать проект'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'project_name',
            [
                'attribute' => 'project_specifications',
                'format' => 'text',
                'value' => function ($model){
                    return StringHelper::truncate($model->project_specifications, 25);
                }
            ],
            'project_date',
            [
                'value' => function (Project $project) {
                    return Html::a('<span class="fa fa-search"></span>открыть', Url::to(['view', 'id' => $project->project_id]), [
                        'title' => Yii::t('app', 'открыть'),
                        'class' => 'btn btn-info btn-xs',
                    ]);
                },
                'headerOptions' => ['style' => 'width:10px'],
                'format' => 'raw',
            ],
            [
                'value' => function (Project $project) {
                    return Html::a('<span class="fa fa-search"></span>изменить', Url::to(['update', 'id' => $project->project_id]), [
                        'title' => Yii::t('app', 'изменить'),
                        'class' => 'btn btn-primary btn-xs',
                    ]);
                },
                'headerOptions' => ['style' => 'width:10px'],
                'format' => 'raw',
            ],
            [
                'value' => function (Project $project) {
                    return Html::a('<span class="fa fa-search"></span>удалить', Url::to(['delete', 'id' => $project->project_id]), [
                        'title' => Yii::t('app', 'удалить'),
                        'class' => 'btn btn-danger btn-xs',
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

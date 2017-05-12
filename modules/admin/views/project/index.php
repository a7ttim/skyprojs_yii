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

$this->title = Yii::t('app', 'Projects');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Project'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            // 'project_id',
            'project_name',
            // 'project_area',
            // 'project_advantages',
            [
                'attribute' => 'project_specifications',
                'format' => 'text',
                'value' => function ($model){
                    return StringHelper::truncate($model->project_specifications, 25);
                }
            ],
            'project_date',
            // 'project_consumers',
            // 'project_protection',
            [
                'value' => function (Project $project) {
                    return Html::a('<span class="fa fa-search"></span>open', Url::to(['view', 'id' => $project->project_id]), [
                        'title' => Yii::t('app', 'open'),
                        'class' => 'btn btn-info btn-xs',
                    ]);
                },
                'headerOptions' => ['style' => 'width:10px'],
                'format' => 'raw',
            ],
            [
                'value' => function (Project $project) {
                    return Html::a('<span class="fa fa-search"></span>update', Url::to(['update', 'id' => $project->project_id]), [
                            'title' => Yii::t('app', 'update'),
                            'class' => 'btn btn-primary btn-xs',
                        ]);
                },
                'headerOptions' => ['style' => 'width:10px'],
                'format' => 'raw',
            ],
            [
                'value' => function (Project $project) {
                    return Html::a('<span class="fa fa-search"></span>delete', Url::to(['delete', 'id' => $project->project_id]), [
                            'title' => Yii::t('app', 'delete'),
                            'class' =>'btn btn-danger btn-xs',
                        ]);
                },
                'headerOptions' => ['style' => 'width:10px'],
                'format' => 'raw',
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>

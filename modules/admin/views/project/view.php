<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\project */

$this->title = $model->project_name;
$this->params['breadcrumbs'][] = ['label' => 'Панель управления', 'url' => ['/admin']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Проекты'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a(Yii::t('app', 'Изменить'), ['update', 'id' => $model->project_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Удалить'), ['delete', 'id' => $model->project_id], [
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
            'project_id',
            'project_name',
            'project_date',
            'project_area',
            'project_advantages',
            'project_specifications',
            'project_consumers',
            'project_protection',
        ],
    ]) ?>
    <table class="table table-striped table-bordered detail-view">
        <tr>
            <th class="col-md-3">
                УДК
            </th>
            <td>
                <?
                foreach ($model->udks as $udk){
                    ?>
                    <?= Html::a(Yii::t('app', $udk->udk_code), ['udk/view', 'id' => $udk->udk_id], ['class' => 'btn btn-primary btn-xs']) ?>
                    <?
                }?>
            </td>
        </tr>
        <tr>
            <th>
                ГРНТИ
            </th>
            <td>
                <?
                foreach ($model->grntis as $grnti){
                    ?>
                    <?= Html::a(Yii::t('app', $grnti->grnti_code), ['grnti/view', 'id' => $grnti->grnti_id], ['class' => 'btn btn-primary btn-xs']) ?>
                    <?
                }?>
            </td>
        </tr>
        <tr>
            <th>
                Подразделения
            </th>
            <td>
                <?
                foreach ($model->departments as $department){
                    ?>
                    <?= Html::a(Yii::t('app', $department->department_name), ['department/view', 'id' => $department->department_id], ['class' => 'btn btn-primary btn-xs']) ?>
                    <?
                }?>
            </td>
        </tr>
        <tr>
            <th>
                Направления
            </th>
            <td>
                <?
                foreach ($model->directions as $direction){
                    ?>
                    <?= Html::a(Yii::t('app', $direction->direction_name), ['direction/view', 'id' => $direction->direction_id], ['class' => 'btn btn-primary btn-xs']) ?>
                    <?
                }?>
            </td>
        </tr>
    </table>

</div>

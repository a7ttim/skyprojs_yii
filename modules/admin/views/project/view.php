<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\project */

$this->title = $model->project_name;
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
    <table class="table table-striped table-bordered detail-view">
        <tr>
            <th>
                УДК
            </th>
            <td>
                <ul>
                    <?
                    foreach ($model->udks as $udk){
                        ?>
                        <li>
                            <?
                            echo $udk->udk_code;
                            ?>
                        </li>
                        <?
                    }?>
                </ul>
            </td>
        </tr>
        <tr>
            <th>
                ГРНТИ
            </th>
            <td>
                <ul>
                    <?
                    foreach ($model->grntis as $grnti){
                        ?>
                        <li>
                            <?
                            echo $grnti->grnti_code;
                            ?>
                        </li>
                        <?
                    }?>
                </ul>
            </td>
        </tr>
        <tr>
            <th>
                Подразделения
            </th>
            <td>
                <ul>
                    <?
                    foreach ($model->departments as $department){
                        ?>
                        <li>
                            <?
                            echo $department->department_name;
                            ?>
                        </li>
                        <?
                    }?>
                </ul>
            </td>
        </tr>
        <tr>
            <th>
                Направления
            </th>
            <td>
                <ul>
                    <?
                    foreach ($model->directions as $direction){
                        ?>
                        <li>
                            <?
                            echo $direction->direction_name;
                            ?>
                        </li>
                        <?
                    }?>
                </ul>
            </td>
        </tr>
    </table>
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

</div>

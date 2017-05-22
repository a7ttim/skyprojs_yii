<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\project */

$this->title = Yii::t('app', 'Изменить проект: ', [
    'modelClass' => 'Project',
]) . $model->project_name;
$this->params['breadcrumbs'][] = ['label' => 'Панель управления', 'url' => ['/admin']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Проекты'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->project_name, 'url' => ['view', 'id' => $model->project_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Изменить');
?>
<div class="project-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

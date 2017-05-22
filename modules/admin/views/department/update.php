<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\department */

$this->title = Yii::t('app', 'Изменить подразделение: ', [
    'modelClass' => 'Department',
]) . $model->department_name;
$this->params['breadcrumbs'][] = ['label' => 'Панель управления', 'url' => ['/admin']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Подразделения'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->department_name, 'url' => ['view', 'id' => $model->department_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Изменить');
?>
<div class="department-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

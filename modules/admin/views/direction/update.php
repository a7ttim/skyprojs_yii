<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\directions */

$this->title = Yii::t('app', 'Изменить направление: ', [
    'modelClass' => 'Directions',
]) . $model->direction_name;
$this->params['breadcrumbs'][] = ['label' => 'Панель управления', 'url' => ['/admin']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Направления'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->direction_name, 'url' => ['view', 'id' => $model->direction_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Изменить');
?>
<div class="directions-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

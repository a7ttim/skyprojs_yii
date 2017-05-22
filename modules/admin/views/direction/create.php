<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\directions */

$this->title = Yii::t('app', 'Создать направление');
$this->params['breadcrumbs'][] = ['label' => 'Панель управления', 'url' => ['/admin']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Направление'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="directions-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

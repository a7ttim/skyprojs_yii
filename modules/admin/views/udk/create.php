<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Udk */

$this->title = 'Создать УДК';
$this->params['breadcrumbs'][] = ['label' => 'Панель управления', 'url' => ['/admin']];
$this->params['breadcrumbs'][] = ['label' => 'УДК', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="udk-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\department */

$this->title = Yii::t('app', 'Создать подразделение');
$this->params['breadcrumbs'][] = ['label' => 'Панель управления', 'url' => ['/admin']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Подразделения'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="department-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

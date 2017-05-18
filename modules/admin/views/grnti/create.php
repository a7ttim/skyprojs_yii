<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\grnti */

$this->title = Yii::t('app', 'Create Grnti');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Grntis'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="grnti-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

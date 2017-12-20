<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
$title_name = 'ОПВРИП | Панель управления';
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<div class="wrap-admin">
    <?php $this->beginBody() ?>
    <div class="container">
    <?php
    NavBar::begin([
        'brandLabel' => $title_name,
        'brandUrl' => '/admin',
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' =>'navbar-nav'],
        'items' => [
            [
                'label' => 'Действия',
                'items' => [
                    ['label' => 'Проекты', 'url' => ['/admin/project']],
                    ['label' => 'УДК', 'url' => ['/admin/udk']],
                    ['label' => 'ГРНТИ', 'url' => ['/admin/grnti']],
                    ['label' => 'Подразделения', 'url' => ['/admin/department']],
                    ['label' => 'Направления', 'url' => ['/admin/direction']],
                ],
            ],
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            //['label' => 'Проекты', 'url' => ['/admin/project']],
            //['label' => 'УДК', 'url' => ['/admin/udk']],
            //['label' => 'ГРНТИ', 'url' => ['/admin/grnti']],
            //['label' => 'Подразделения', 'url' => ['/admin/department']],
            //['label' => 'Направления', 'url' => ['/admin/direction']],
            [
                'label' => 'Вход',
                'url' => ['/auth/login'],
                'visible' => Yii::$app->user->isGuest
            ],
            [
                'label' => 'Выход ('.Yii::$app->user->identity->admin_login.')',
                'url' => ['/auth/logout'],
                'visible' => !Yii::$app->user->isGuest]
        ],
    ]);
    NavBar::end();
    ?>
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?=$title_name.' '.date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

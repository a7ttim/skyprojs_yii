<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\widgets\Menu;

AppAsset::register($this);
$title_name = 'ОПВРИП | Проекты';$action = Yii::$app->controller->action->id;
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
<?php $this->beginBody() ?>
<div class="wrap bg-dark">
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <form role="search" method ="get" action="<?= Yii::$app->request->getBaseUrl() ?>/site/search">
                    <div class="input-group">
                        <input class="form-control" id="search" type="text" placeholder="Поиск" name="search" required>
                        <div class="input-group-btn" id="searchdropmenu">
                            <button type="button" class="btn btn-primary dropdown-toggle" value="" data-toggle="dropdown" tabindex="-1" onclick="document.getElementById('searchdropmenu').classList.toggle('open')">
                                <span class="caret"></span>
                                <span id="catName" class="">Проекты</span>
                            </button>
                            <ul class="dropdown-menu pull-right" role="menu">
                                <li><a href="#" onclick="document.getElementById('radio').value = 'proj';document.getElementById('catName').innerHTML = 'Проекты';">Проекты</a></li>
                                <li><a href="#" onclick="document.getElementById('radio').value = 'grnti';document.getElementById('catName').innerHTML = 'ГРНТИ';">ГРНТИ</a></li>
                                <li><a href="#" onclick="document.getElementById('radio').value = 'udk';document.getElementById('catName').innerHTML = 'УДК';">УДК</a></li>
                                <li><a href="#" onclick="document.getElementById('radio').value = 'department';document.getElementById('catName').innerHTML = 'Подразделения';">Подразделения</a></li>
                            </ul>
                            <button type="submit" class="btn btn-primary" tabindex="-1">Поиск</button>
                        </div>
                    </div><!-- /.input-group -->
                    <input type="hidden" id="radio" name="radio" value="proj">
                </form>
            </div>
            <div class="panel-body">
                <?= Nav::widget([
                    'options' => ['class' =>'nav-tabs'], // set this to nav-tab to get tab-styled navigation
                    'items' => [
                        ['label' => 'Главная', 'url' => ['site/index']],
                        ['label' => 'УДК', 'url' => ['site/udks']],
                        ['label' => 'ГРНТИ', 'url' => ['site/grntis']],
                        ['label' => 'Подразделения', 'url' => ['site/departments']],
                    ],
                ]);
                ?>
                <?= Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>
                <?= $content ?>
            </div>
        </div>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?=$title_name.' '.date('Y') ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

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

$action = Yii::$app->controller->action->id;

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
<!--<div class="navig">-->
<!--    --><?php
//    echo Nav::widget([
//        'items' => [
//            [
//                'label' => 'О ТУСУРе',
//                'items' => [
//                    ['label' => 'Структура и органы управления', 'url' => 'https://tusur.ru/ru/o-tusure/struktura-i-organy-upravleniya'],
//                    ['label' => 'Образование', 'url' => 'https://tusur.ru/ru/obrazovanie'],
//                    ['label' => 'Наука и инновации', 'url' => 'https://tusur.ru/ru/nauka-i-innovatsii'],
//                    ['label' => 'Сотрудничество', 'url' => 'https://tusur.ru/ru/sotrudnichestvo'],
//                    ['label' => 'Новости и мероприятия', 'url' => 'https://tusur.ru/ru/novosti-i-meropriyatiya'],
//                    ['label' => 'Телефонный справочник', 'url' => 'https://directory.tusur.ru/'],
//                    ['label' => 'Сведения об образовательной организации', 'url' => 'https://tusur.ru/sveden'],
//                    ['label' => 'База нормативных документов', 'url' => 'https://regulations.tusur.ru/'],
//                ],
//            ],
//            [
//                'label' => 'Абитуриентам',
//                'items' => [
//                    ['label' => 'Кабинет абитуриента', 'url' => 'https://priem.tusur.ru/'],
//                    ['label' => 'Направления подготовки бакалавров и специалистов', 'url' => 'https://abiturient.tusur.ru/ru/napravleniya-podgotovki/ochnaya-forma-obucheniya'],
//                    ['label' => 'Магистерские программы', 'url' => 'https://magistrant.tusur.ru/ru/magisterskie-programmy/ochnaya-forma-obucheniya'],
//                    ['label' => 'Календарь абитуриента', 'url' => 'https://abiturient.tusur.ru/ru/kak-postupit/ochnaya-forma-obucheniya?type=vst_ege,doc_budget,zach_budget,info'],
//                    ['label' => 'Пункты выезда приёмных комиссий', 'url' => 'https://abiturient.tusur.ru/ru/kontakty#comissions'],
//                ],
//            ],
//            [
//                'label' => 'Студентам',
//                'items' => [
//                    ['label' => 'Расписание занятий', 'url' => 'https://timetable.tusur.ru/'],
//                    ['label' => 'Научно-образовательный портал', 'url' => 'https://edu.tusur.ru/'],
//                    ['label' => 'Библиотека', 'url' => 'http://lib.tusur.ru/'],
//                    ['label' => 'Групповое проектное обучение', 'url' => 'https://gpo.tusur.ru/'],
//                    ['label' => 'Журнал посещаемости', 'url' => 'https://attendance.tusur.ru/'],
//                    ['label' => 'Журнал успеваемости', 'url' => 'https://ocenka.tusur.ru/'],
//                    ['label' => 'Профком студентов', 'url' => 'http://studprof.tusur.ru/'],
//                    ['label' => 'Содействие трудоустройству', 'url' => 'http://aist.tusur.ru/'],
//                ],
//            ],
//            [
//                'label' => 'Аспирантам',
//                'items' => [
//                    ['label' => 'Поступление в аспирантуру', 'url' => 'https://tusur.ru/ru/obrazovanie/aspirantura/postuplenie-v-aspiranturu'],
//                    ['label' => 'Направления подготовки', 'url' => 'https://tusur.ru/ru/obrazovanie/aspirantura/napravleniya-podgotovki'],
//                    ['label' => 'Диссертационные советы', 'url' => 'https://tusur.ru/ru/nauka-i-innovatsii/podgotovka-kadrov-vysshey-nauchnoy-kvalifikatsii/dissertatsionnye-sovety'],
//                    ['label' => 'Научно-образовательный портал', 'url' => 'https://edu.tusur.ru/'],
//                    ['label' => 'Библиотека', 'url' => 'http://lib.tusur.ru/'],
//                    ['label' => 'Журнал "Доклады ТУСУР"', 'url' => 'https://journal.tusur.ru/'],
//                ],
//            ],
//            [
//                'label' => 'Сотрудникам',
//                'items' => [
//                    ['label' => 'Телефонный справочник', 'url' => 'https://directory.tusur.ru/'],
//                    ['label' => 'Расписание занятий', 'url' => 'https://timetable.tusur.ru/'],
//                    ['label' => 'Научно-образовательный портал', 'url' => 'https://edu.tusur.ru/'],
//                    ['label' => 'Журнал посещаемости', 'url' => 'https://attendance.tusur.ru/'],
//                    ['label' => 'Генератор рабочих программ', 'url' => 'https://workprogram.tusur.ru/'],
//                    ['label' => 'Ввод успеваемости', 'url' => 'https://ocenka.tusur.ru/'],
//                    ['label' => 'Показатели эффективности труда ППС', 'url' => 'https://effective-contracts.tusur.ru/docs'],
//                    ['label' => 'Профком сотрудников', 'url' => 'http://profkom.tusur.ru/'],
//                ],
//            ],
//            [
//                'label' => 'Выпускникам',
//                'items' => [
//                    ['label' => 'Ассоциация выпускников ТУСУР', 'url' => 'http://avt.tusur.ru/'],
//                    ['label' => 'Содействие трудоустройству', 'url' => 'http://aist.tusur.ru/'],
//                ],
//            ],
//            [
//                'label' => 'Войти',
//                'url' => ['auth/login'],
//                'options' => ['class' => 'login'],
//            ],
//        ],
//        'options' => ['class' =>'nav-pills'], // set this to nav-tab to get tab-styled navigation
//    ]);
//    ?>
<!--</div>-->
<body>
<?php $this->beginBody() ?>
<div class="wrap bg-dark">
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <form role="search" method ="get" action="<?= Yii::$app->request->getBaseUrl() ?>search">
                    <div class="input-group">
                        <input class="form-control" id="search" type="text" placeholder="Поиск" name="search" required>
                        <div class="input-group-btn">
                            <button type="button" class="btn btn-primary dropdown-toggle" value="" data-toggle="dropdown" tabindex="-1">
                                <span class="caret"></span>
                                <span id="catName" class="">Проекты</span>
                            </button>
                            <ul class="dropdown-menu pull-right" role="menu">
                                <li><a href="#" onclick="document.getElementById('radio').value = 'proj';document.getElementById('catName').innerHTML = 'Проекты';">Проекты</a></li>
                                <li><a href="#" onclick="document.getElementById('radio').value = 'class';document.getElementById('catName').innerHTML = 'Классификаторы';">Классификаторы</a></li>
                                <li><a href="#" onclick="document.getElementById('radio').value = 'dep';document.getElementById('catName').innerHTML = 'Подразделения';">Подразделения</a></li>
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
                        ['label' => 'УДК', 'url' => ['site/udk']],
                        ['label' => 'ГРНТИ', 'url' => ['site/grnti']],
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

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

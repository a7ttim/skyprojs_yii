<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;

$this->title = 'Панель управления';
?>
<div class="admin-default-index">
    <h1>Панель управления</h1>
    <ul>
        <li>
            <a href="/admin/project">Проекты</a>
        </li>
        <li>
            <a href="/admin/udk">УДК</a>
        </li>
        <li>
            <a href="/admin/grnti">ГРНТИ</a>
        </li>
        <li>
            <a href="/admin/department">Подразделения</a>
        </li>
        <li>
            <a href="/admin/direction">Направления</a>
        </li>
    </ul>
</div>

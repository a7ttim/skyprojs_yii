<?php
/**
 * Created by PhpStorm.
 * User: A7ttim
 * Date: 19.02.2017
 * Time: 17:03
 */

use yii\widgets\LinkPager;

$this->title = $title;
//$this->params['breadcrumbs'][] = $this->title;
?>
    <h1>Подразделения</h1>
<?
foreach ($departments as $department) {?>
    <li class="list-group-item">
        <a href="<?=Yii::$app->urlManager->createUrl(['site/departments', 'id' => $department->department_id])?>">
            <?=$department->department_name?>
        </a>
    </li>
    <?
}
?>
<?= LinkPager::widget([
    'pagination' => $pages,
]);
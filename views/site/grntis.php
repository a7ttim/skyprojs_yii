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
    <h1>
        ГРНТИ
        <?=
        $name
        ?>
    </h1>
<?
foreach ($grntis as $grnti){
    ?>
    <li class="list-group-item">
        <h4>
            <a href="
                <?=
            Yii::$app->urlManager->createUrl(['site/grntis', 'grnti_id' => $grnti->grnti_id])
            ?>
                ">
                <?=
                $grnti->grnti_code;
                ?>
            </a>
        </h4>
        <span>
                    <?=
                    $grnti->grnti_name;
                    ?>
                </span>
    </li>
    <?
}
?>
<?= LinkPager::widget([
    'pagination' => $pages,
]);

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
        УДК
        <?=
        $name
        ?>
    </h1>
<?
foreach ($udks as $udk){
    ?>
    <li class="list-group-item">
        <h4>
            <a href="
                <?=
            Yii::$app->urlManager->createUrl(['site/udks', 'udk_id' => $udk->udk_id])
            ?>
                ">
                <?=
                $udk->udk_code;
                ?>
            </a>
        </h4>
        <div>
            <?=
            $udk->udk_name;
            ?>
        </div>
    </li>
    <?
}
?>
<?= LinkPager::widget([
    'pagination' => $pages,
]);

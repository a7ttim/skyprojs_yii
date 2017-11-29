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
    Направления
</h1>
<?
foreach ($directions as $direction){
    ?>
    <li class="list-group-item">
        <h3>
            <a href="
                <?=
            Yii::$app->urlManager->createUrl(['site/directions', 'direction_id' => $direction->direction_id])
            ?>
                ">
                <?=
                $direction->direction_name;
                ?>
            </a>
        </h3>
    </li>
    <?
}
?>


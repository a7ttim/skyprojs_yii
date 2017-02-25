<?php
/**
 * Created by PhpStorm.
 * User: A7ttim
 * Date: 19.02.2017
 * Time: 17:03
 */

use yii\widgets\LinkPager;

$this->title = $project->project_name;
//$this->params['breadcrumbs'][] = $this->title;
?>
<h1>
    <?=
    $project->project_name
    ?>
</h1>
<p>
    <?=
    $project->project_definition
    ?>
</p>
<h3>
    УДК
</h3>
<ul>
    <?
    foreach ($udks as $udk){
        ?>
        <li>
            <a href="
            <?=
            Yii::$app->urlManager->createUrl(['site/udks', 'udk_code' => $udk->udk_id])
            ?>
            ">
                <?=
                $udk->udk_name
                ?>
            </a>
        </li>
        <?
    }
    ?>
</ul>
<h3>
    Участники
</h3>
<ul>
    <?
    foreach ($users as $user){
        ?>
        <li>
            <?=
            $user->member_name
            ?>
        </li>
        <?
    }
    ?>
</ul>
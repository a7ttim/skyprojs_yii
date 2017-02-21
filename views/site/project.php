<?php
/**
 * Created by PhpStorm.
 * User: A7ttim
 * Date: 19.02.2017
 * Time: 17:03
 */

use yii\widgets\LinkPager;

?>
<h1>
    Проекты
    <?=
    $name
    ?>
</h1>
<ul>
    <?
    foreach ($list as $project){
        ?>
        <li>
            <h3>
                <?=
                Yii::$app->urlManager->createUrl(['site/project', $project->project_name]).' '.
                $project->project_name;
                ?>
            </h3>
            <div>
                <?=
                $project->project_definition;
                ?>
            </div>
        </li>
        <?
    }
    ?>
</ul>
<?= LinkPager::widget(['pagination' => $pagination]) ?>

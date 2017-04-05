<?php
/**
 * Created by PhpStorm.
 * User: A7ttim
 * Date: 19.02.2017
 * Time: 17:03
 */

use yii\widgets\LinkPager;

$this->title = $title;
$this->params['breadcrumbs'][] = $this->title;
?>
<h1>
    Проекты
    <?=
    $name
    ?>
</h1>
<ul>
    <?
    foreach ($projects as $project){
        ?>
        <li>
            <h3>
                <a href="
                <?=
                Yii::$app->urlManager->createUrl(['site/project', 'name' => $project->project_name])
                ?>
                ">
                    <?=
                    $project->project_name;
                    ?>
                </a>
            </h3>
            <div>
                <?=
                $project->project_specifications;
                ?>
            </div>
        </li>
        <?
    }
    ?>
</ul>
<?= LinkPager::widget(['pagination' => $pagination]) ?>

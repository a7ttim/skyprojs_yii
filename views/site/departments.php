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
    foreach ($departments as $department){
        ?>
        <li>
            <h3>
                <a href="
                <?=
                Yii::$app->urlManager->createUrl(['site/projects', 'dep_code' => $department->department_id])
                ?>
                ">
                    <?=
                    $department->department_name;
                    ?>
                </a>
            </h3>
        </li>
        <?
    }
    ?>
</ul>
<?//= LinkPager::widget(['pagination' => $pagination]) ?>

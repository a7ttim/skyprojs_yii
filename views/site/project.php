<?php
/**
 * Created by PhpStorm.
 * User: A7ttim
 * Date: 19.02.2017
 * Time: 17:03
 */
use app\models\Project;

$this->title = $project->project_name;;
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class = 'proj_content'>
    <div class = 'title'>
        <h1><?php echo $project->project_name;?></h1>
    </div>
    <div class = 'project'>
        <?
        if(strlen(str_replace(" ","", $project->project_area)) > 0){
            ?>
            <h3 class = 'zag'>
                Направление:
            </h3>
            <p class = 'desc'>
                <?=$project->project_area;?>
            </p>
            <?
        }
        if(strlen(str_replace(" ","", $project->project_advantages)) > 0){
            ?>
            <h3 class = 'zag'>
                Преимущества:
            </h3>
            <p class = 'desc'>
                <?=$project->project_advantages;?>
            </p>
            <?
        }
        if(strlen(str_replace(" ","", $project->project_specifications)) > 0){
            ?>
            <h3 class = 'zag'>
                Спецификации:
            </h3>
            <p class = 'desc'>
                <?=$project->project_specifications;?>
            </p>
            <?
        }
        if(strlen(str_replace(" ","", $project->project_consumers)) > 0){
            ?>
            <h3 class = 'zag'>
                Заинтересованные струкутуры:
            </h3>
            <p class = 'desc'>
                <?=$project->project_consumers;?>
            </p>
            <?
        }
        ?>
    </div><!--
    <div class = 'right'>
        <h3>
            Участники проекта
        </h3>
        <?php /*foreach ($members as $member) {
            echo $member->member_surname.'&nbsp'.$member->member_name.'&nbsp'.$member->member_patronymic;
        }
        */?>
    </div>-->
</div>
<?php 
if ($radio == 'class')
{
    if ($count = count($grnti) != 0)
    {
        echo count($grnti);
        $this->title = 'ГРНТИ';
        ?>
        <div class = 'index1'>
        <div class = 'title'>
        <h1>ГРНТИ</h1>
        </div>
        <ul>
        <div class = 'directions'>
        <?
        foreach ($grnti as $gr)
        {
        ?>
            <li><div class = 'projects'><a href="<?=Yii::$app->urlManager->createUrl(['site/grnti', 'id' => $gr->grnti_id])?>"><?=$gr->grnti_name?></a></li>
        <?php
        }
        ?>
        </div>
        </div>
        </div>
    <?php
    }
    else if ($count = count($udk) != 0)
    {
        $this->title = 'УДК';
        ?>
        <div class = 'index1'>
        <div class = 'title'>
        <h1>УДК</h1>
        </div>
        <ul>
        <div class = 'directions'>
        <?
        foreach ($udk as $ud)
        {
        ?>
            <li><div class = 'projects'><a href="<?=Yii::$app->urlManager->createUrl(['site/udk', 'id' => $ud->udk_id])?>"><?=$ud->udk_name?></a>
            <div class = 'udk_projs'><a href="<?=Yii::$app->urlManager->createUrl(['site/udk', 'projects' => $ud->udk_id])?>">Проекты</a></div></li>
        <?php
        }
        ?>
        </div>
        </div>
        </div>
    <?php
    }
    else
    {
        $this->title = 'Ошибка';
        ?>
        <div class = 'index1'>
        <div class = 'title'>
        <h1>Нет классификаторов<h1>
        </div>
        </div>
        <?
    }
}
else if ($radio == 'proj')
{
    if (count($projects) != 0)
    {
        $this->title = 'Проекты';
        ?>
        <div class = 'index1'>
        <div class = 'title'>
        <h1>Проекты</h1>
        </div>
        <ul>
        <div class = 'directions'>
        <?
        foreach ($projects as $project)
        {
        ?>
            <li><div class = 'projects'><a href="<?=Yii::$app->urlManager->createUrl(['site/project', 'id' => $project->project_id])?>"><?=$project->project_name?></a></li>
        <?php
        }
        ?>
        </div>
        </div>
        </div>
    <?php
    }
    else
    {
        $this->title = 'Ошибка';
        ?>
        <div class = 'index1'>
        <div class = 'title'>
        <h1>Нет проетов</h1>
        </div>
        </div>
        <?php
    }
}
else
{
    if (count($departments) != 0)
    {
        $this->title = 'Подразделения';
        ?>
        <div class = 'index1'>
        <div class = 'title'>
        <h1>Подразделения</h1>
        </div>
        <ul>
        <div class = 'directions'>
        <?
        foreach ($departments as $department)
        {
        ?>
            <li><div class = 'projects'><a href="<?=Yii::$app->urlManager->createUrl(['site/departments', 'id' => $department->department_id])?>"><?=$department->department_name?></a></li>
        <?php
        }
        ?>
        </div>
        </div>
        </div>
    <?php
    }
    else
    {
        $this->title = 'Ошибка';
        ?>
        <div class = 'index1'>
        <div class = 'title'>
        <h1>Нет подразделений</h1>
        </div>
        </div>
        <?php
    }
}
?>
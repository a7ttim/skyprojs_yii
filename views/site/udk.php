<?php
use app\models\Classificate2;
use app\models\Classificate1;
use app\models\Udk;
use app\models\Grnti;
use app\models\Project;

$this->title = 'УДК';
$proj = Yii::$app->request->get("projects");
if (count ($proj) != 0)
{
    $projs = Classificate2::find()->where(['udk_id'=>$proj])->all();
    ?>
    <div class = 'index1'>
    <div class = 'title'>
    <h1>Проекты</h1>
    </div>
    <ul>
    <div class = 'directions'>
    <?php
    foreach ($projs as $item)
    {
        $project = Project::find()->where(['project_id'=>$item->project_id])->all();
        $udks = Classificate2::find()->where(['project_id'=>$item->project_id])->all();
        $grntis = Classificate1::find()->where(['project_id'=>$item->project_id])->all();
        foreach ($project as $item1)
        {
            ?>
            <li> <div class = 'projects'><a href="<?=Yii::$app->urlManager->createUrl(['site/project', 'id' => $item1->project_id])?>"><div class = 'project_name'><?=$item1->project_name?></a></div>
            <?php
        }
        ?>
        <div class = 'codes_full'>
        <?php
        echo 'УДК:&nbsp';
        ?>
        <div class = 'codes'>
        <?php
        foreach ($udks as $cl)
        {
            $codes = Udk::find()->where(['udk_id'=>$cl->udk_id])->all();
            foreach ($codes as $code)
            {
                ?>
                <a href="<?=Yii::$app->urlManager->createUrl(['site/udk', 'id' => $cl->udk_id])?>"><span class = 'code'><?=$code->udk_code?></span></a>
                <?php
            }
        }
            ?>
    </div>
    </div>
    <div class = 'codes_full'>
    <?php
    echo 'ГРНТИ:&nbsp';
    ?>
    <div class = 'codes'>
    <?php
    foreach ($grntis as $cl)
    {
        $codes = Grnti::find()->where(['grnti_id'=>$cl->grnti_id])->all();
        foreach ($codes as $code)
        {
            ?>
            <a href="<?=Yii::$app->urlManager->createUrl(['site/grnti', 'id' => $cl->grnti_id])?>"><span class = 'code'><?=$code->grnti_code?></span></a>
            <?php
        }
    }
    }
    ?>
    </div>
    </div>
    </div>
    </li>
    </ul>
    <?php
}
else
{
?>
<div class = 'index1'>
<div class = 'title'>
<h1>УДК</h1>
</div>
<ul>
<div class = 'directions'>
<?php
foreach ($udk as $item) {?>
    <li><div class = 'projects'><a href="<?=Yii::$app->urlManager->createUrl(['site/udk', 'id' => $item->udk_id])?>"><?=$item->udk_name?></a>
<?php
    $udks = Classificate2::find()->where(['udk_id'=>$item->udk_id])->all();
    if (count($udks) != 0)
    {
        ?>
        <div class = 'udk_projs'>
        <a href="<?=Yii::$app->urlManager->createUrl(['site/udk', 'projects' => $item->udk_id])?>">Проекты</a>
        </div>
        <?php
    }
}
if (count($udk == 0))
        //echo 'Нет УДК';
?>
</li>
</div>
</div>
</div>
</ul>
<?php } ?>
</div>
<?php
use app\models\Classificate2;
use app\models\Classificate1;
use app\models\Udk;
use app\models\Grnti;
if (count($projects) == 0)
{
$this->title = 'ГРНТИ'; ?>
<div class = 'index1'>
<div class = 'title'>
<h1>ГРНТИ</h1>
</div>
<ul>
<div class = 'directions'>
<?php
foreach ($grnti as $item) {?>
<li><div class = 'projects'><a href="<?=Yii::$app->urlManager->createUrl(['site/grnti', 'id' => $item->grnti_id])?>"><?=$item->grnti_name?></a></li>
<?php }?>
</div>
</div>
</div>
</ul>
<?php }
else
{
$this->title = 'Проекты'; ?>
<div class = 'index1'>
<div class = 'title'>
<h1>Проекты</h1>
</div>
<ul>
<div class = 'directions'>
<?php
foreach ($projects as $project) {
    $udks = Classificate2::find()->where(['project_id'=>$project->project_id])->all();
    $grntis = Classificate1::find()->where(['project_id'=>$project->project_id])->all();?>
    <li> <div class = 'projects'><a href="<?=Yii::$app->urlManager->createUrl(['site/project', 'id' => $project->project_id])?>"><div class = 'project_name'><?=$project->project_name?></a></div>
    <div class = 'codes_full'>
    <?php
    echo 'УДК:&nbsp';
    ?>
    <div class = 'codes'>
    <?php
    foreach ($udks as $item)
    {
        $codes = Udk::find()->where(['udk_id'=>$item->udk_id])->all();
        foreach ($codes as $code)
        {
            ?>
            <a href="<?=Yii::$app->urlManager->createUrl(['site/udk', 'id' => $item->udk_id])?>"><span class = 'code'><?=$code->udk_code?></span></a>
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
    foreach ($grntis as $item)
    {
        $codes = Grnti::find()->where(['grnti_id'=>$item->grnti_id])->all();
        foreach ($codes as $code)
        {
            ?>
            <a href="<?=Yii::$app->urlManager->createUrl(['site/grnti', 'id' => $item->grnti_id])?>"><span class = 'code'><?=$code->grnti_code?></span></a>
            <?php
        }
    }
    ?>
    </div>
    </div>
    </div>
    </li>
<?php } ?>
</div>
</div>
</ul>
<?php } ?>  
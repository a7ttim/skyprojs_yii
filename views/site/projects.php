<?php
/**
 * Created by PhpStorm.
 * User: A7ttim
 * Date: 19.02.2017
 * Time: 17:03
 */
use app\models\Classificate1;
use app\models\Classificate2;
use app\models\Udk;
use app\models\Grnti;

use yii\widgets\LinkPager;

$this->title = $title;
//$this->params['breadcrumbs'][] = $this->title;
?>
<h1>
    Проекты
    <?=
    $name
    ?>
</h1>
<?
foreach ($projects as $project){
    ?>
    <li class="list-group-item">
        <div>
            <?
            //$pj = $project->project_id;
            $udks = Classificate2::find()->where(['project_id'=>$project->project_id])->all();
            $grntis = Classificate1::find()->where(['project_id'=>$project->project_id])->all();
            ?>

            <a href="<?=Yii::$app->urlManager->createUrl(['site/project', 'project_id' => $project->project_id])?>">
                <?=$project->project_name?>
            </a>
        </div>
        <div>
            <?= 'УДК:&nbsp'; ?>
            <?
            foreach ($udks as $item)
            {
                $codes = Udk::find()->where(['udk_id'=>$item->udk_id])->all();
                foreach ($codes as $code)
                {
                    ?>
                    <a href="<?=Yii::$app->urlManager->createUrl(['site/udks', 'udk_id' => $item->udk_id])?>"><span class = 'code'><?=$code->udk_code?></span></a>
                    <?php
                }
            }?>
        </div>
        <div>
            <?= 'ГРНТИ:&nbsp' ?>
            <?
            foreach ($grntis as $item)
            {
                $codes = Grnti::find()->where(['grnti_id'=>$item->grnti_id])->all();
                foreach ($codes as $code)
                {
                    ?>
                    <a href="<?=Yii::$app->urlManager->createUrl(['site/grntis', 'grnti_id' => $item->grnti_id])?>"><span class = 'code'><?=$code->grnti_code?></span></a>
                    <?php
                }
            }
            ?>
        </div>
    </li>
    <?
}
?>
<?= LinkPager::widget(['pagination' => $pages]) ?>

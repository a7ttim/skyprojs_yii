<?php
$this->title = 'Статистика';
use app\models\Working;
foreach ($statistic as $item)
{
    $wrk = Working::find()->where(['project_id'=>$item->project_id])->all();
    echo count($wrk);
}
?>
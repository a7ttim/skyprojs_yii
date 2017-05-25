<?php $this->title = 'Критические технологии'; ?>
<div class = 'index1'>
<div class = 'title'>
<h1>Критические технологии</h1>
</div>
<ul>
<div class = 'directions'>
<?php foreach ($directions as $direction) {?>
<li><div class = 'projects'><a href="<?=Yii::$app->urlManager->createUrl(['site/directions', 'id' => $direction->direction_id])?>"><?=$direction->direction_name?></a></li>
<?php } ?>
</div>
</div>
</ul>
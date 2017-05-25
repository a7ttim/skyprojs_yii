<?php $this->title = $project->project_name; ?>
<div class = 'proj_content'>
<div class = 'title'>
<h1><?php echo $project->project_name;?></h1>
</div>
<div class = 'project'>
<div class = 'zag'>
Направление
</div>
<div class = 'desc'>
<?php echo $project->project_area;?>
</div>
<div class = 'zag'>
Преимущества
</div>
<div class = 'desc'>
<?php echo $project->project_advantages;?>
</div>
<div class = 'zag'>
Спецификации
</div>
<div class = 'desc'>
<?php echo $project->project_specifications;?>
</div>
<div class = 'zag'>
Заинтересованные струкутуры
</div>
<div class = 'desc'>
<?php echo $project->project_consumers;?>
</div>
</div>
<div class = 'right'>
<h3>
Участники проекта
</h3>
<?php foreach ($members as $member) {
echo $member->member_surname.'&nbsp'.$member->member_name.'&nbsp'.$member->member_patronymic;
}
?>
</div>
</div>
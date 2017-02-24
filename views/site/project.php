<?php
/**
 * Created by PhpStorm.
 * User: A7ttim
 * Date: 19.02.2017
 * Time: 17:03
 */

use yii\widgets\LinkPager;

$this->title = 'Проект';
$this->params['breadcrumbs'][] = $this->title;
?>
<h1>
    <?=
    $project->project_name
    ?>
</h1>
<p>
    <?=
    $project->project_definition
    ?>
</p>

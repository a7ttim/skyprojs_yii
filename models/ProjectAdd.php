<?php
/**
 * Created by PhpStorm.
 * User: A7ttim
 * Date: 18.02.2017
 * Time: 12:59
 */

namespace app\models;

use Yii;
use yii\base\Model;

class ProjectAdd extends Project{
    public $name;
    public $definition;
    public $file;

    public function rules()
    {
        return[
            // Rules
            [['name', 'definition'], 'required', 'message' => 'Заполните это поле'],
            [['file'], 'file', 'extensions' => 'jpg, png, gif'],
        ];
    }
}
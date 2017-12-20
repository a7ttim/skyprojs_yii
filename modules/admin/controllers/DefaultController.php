<?php

namespace app\modules\admin\controllers;

use app\models\User;
use app\models\WorkingOn;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;

/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */

    public function behaviors()
    {
        return [
            'access'    =>  [
                'class' =>  AccessControl::className(),
                'denyCallback'  =>  function($rule, $action)
                {
                    throw new \yii\web\NotFoundHttpException('Страница не найдена.');
                },
                'rules' =>  [
                    [
                        'allow' =>  true,
                        'matchCallback' =>  function($rule, $action)
                        {
                                return !Yii::$app->user->isGuest;
                        }
                    ]
                ]
            ]
        ];
    }

    public function actionIndex()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->render('index');
        }
        return $this->render('index');
    }
}

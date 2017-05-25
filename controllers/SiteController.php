<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Directions;
use app\models\Department;
use app\models\Collaborator;
use app\models\Project;
use app\models\Udk;
use app\models\Grnti;
use app\models\Working;
use app\models\Member;
use app\models\Classificate3;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $directions = Directions::find()->all();

        return $this->render(
        'index', ['directions' => $directions]
        );
    }
    
    public function actionDepartments()
    {
        $id = Yii::$app->request->get("id");
        $departments = Department::find()->where(['department_parent_id'=>$id])->all();
        $deps = Department::findOne($id);
        $projects = $deps->projects;

        return $this->render(
        'departments', ['departments' => $departments, 'projects' => $projects]
        );
    }
    
    public function actionStatistic()
    {
        $statistic = Project::find()->all();
        return $this->render('statistic', ['statistic' => $statistic]);
    }
    
    public function actionUdk()
    {
        $id = Yii::$app->request->get("id");
        $udk = Udk::find()->where(['udk_parent_id'=>$id])->all();

        return $this->render(
        'udk', ['udk' => $udk]
        );
    }
    
    public function actionGrnti()
    {
        $id = Yii::$app->request->get("id");
        $grnti = Grnti::find()->where(['grnti_parent_id'=>$id])->all();
        $grntis = Grnti::findOne($id);
        $projects = $grntis->projects;
        
        return $this->render(
        'grnti', ['grnti' => $grnti, 'projects' => $projects]
        );
    }
    
        public function actionDirections()
    {
        $id = Yii::$app->request->get("id");
        $dirs = Directions::findOne($id);
        $projects = $dirs->projects;
        $pj = Project::findOne($id);
        $udk = $pj->udks;
        
        return $this->render('directions', ['projects' => $projects, 'udk' => $udk]
        );
    }
        public function actionProject()
    {
        $id = Yii::$app->request->get("id");
        $project = Project::findOne($id);
        $members = $project->members;
        
        return $this->render('project', ['project' => $project, 'members' => $members]
        );
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

}

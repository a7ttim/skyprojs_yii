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
use yii\data\Pagination;

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
        $directions = Directions::find()->with('projects')->all();

        return $this->render(
            'directions', ['directions' => $directions]
        );
    }

    public function actionDepartments()
    {
        $id = Yii::$app->request->get("id");
        $departments = Department::find()->where(['department_parent_id'=>$id]);
        if(count($departments->all()) > 0) {

            $countDepartments = clone $departments;
            $pages = new Pagination(['totalCount' => $countDepartments->count(), 'pageSize' => 15]);
            return $this->render(
                'departments', [
                    'departments' => $departments->offset($pages->offset)
                        ->limit($pages->limit)
                        ->all(),
                    'pages' => $pages
                ]
            );
        }
        else {
            $udk = Department::findOne(['department_id' => $id]);
            $projects = $udk->getProjects();
            $countProjects = clone $projects;
            $pages = new Pagination(['totalCount' => $countProjects->count(), 'pageSize' => 15]);
            return $this->render('projects', ['projects' => $projects->offset($pages->offset)
                    ->limit($pages->limit)
                    ->all(),
                    'pages' => $pages
                ]
            );
        }
    }

    public function actionStatistic()
    {
        $statistic = Project::find()->all();
        return $this->render('statistic', ['statistic' => $statistic]);
    }

    public function actionUdks()
    {
        $id = Yii::$app->request->get("udk_id");
        $udks = Udk::find()->where(['udk_parent_id' => $id]);
        if(count($udks->all()) > 0){
            $countUdks = clone $udks;
            $pages = new Pagination(['totalCount' => $countUdks->count(), 'pageSize' => 15]);
            return $this->render(
                'udks', [
                    'udks' => $udks->offset($pages->offset)
                        ->limit($pages->limit)
                        ->all(),
                    'pages' => $pages
                ]
            );
        }
        else {
            $udk = Udk::findOne(['udk_id' => $id]);
            $projects = $udk->getProjects();
            $countProjects = clone $projects;
            $pages = new Pagination(['totalCount' => $countProjects->count(), 'pageSize' => 15]);
            return $this->render('projects', ['projects' => $projects->offset($pages->offset)
                    ->limit($pages->limit)
                    ->all(),
                    'pages' => $pages
                ]
            );
        }
    }

    public function actionGrntis()
    {
        $id = Yii::$app->request->get("grnti_id");
        $grntis = Grnti::find()->where(['grnti_parent_id' => $id]);
        if(count($grntis->all()) > 0){
            $countGrntis = clone $grntis;
            $pages = new Pagination(['totalCount' => $countGrntis->count(), 'pageSize' => 15]);
            return $this->render(
                'grntis', [
                    'grntis' => $grntis->offset($pages->offset)
                        ->limit($pages->limit)
                        ->all(),
                    'pages' => $pages
                ]
            );
        }
        else {
            $grnti = Grnti::findOne(['grnti_id' => $id]);
            $projects = $grnti->getProjects();
            $countProjects = clone $projects;
            $pages = new Pagination(['totalCount' => $countProjects->count(), 'pageSize' => 15]);
            return $this->render('projects', ['projects' => $projects->offset($pages->offset)
                    ->limit($pages->limit)
                    ->all(),
                    'pages' => $pages
                ]
            );
        }
    }

    public function actionDirections()
    {
        $id = Yii::$app->request->get("direction_id");
        $dir = Directions::findOne(['direction_id' => $id]);
        $projects = $dir->getProjects();
        $countProjects = clone $projects;
        $pages = new Pagination(['totalCount' => $countProjects->count(), 'pageSize' => 15]);
        return $this->render('projects', ['projects' => $projects->offset($pages->offset)
                ->limit($pages->limit)
                ->all(),
                'pages' => $pages
            ]
        );
    }

    public function actionProjects($projects, $pages)
    {
        return $this->render('projects', ['projects' => $projects->offset($pages->offset)
                ->limit($pages->limit)
                ->all(),
                'pages' => $pages
            ]
        );
    }

    public function actionProject()
    {
        $id = Yii::$app->request->get("project_id");
        $project = Project::findOne(['project_id' => $id]);
        $members = $project->members;

        return $this->render('project', ['project' => $project, 'members' => $members]
        );
    }

    public function actionSearch()
    {
        $radio = Yii::$app->request->get("radio");
        $search = Yii::$app->request->get("search");
        switch ($radio){
            case 'udk':
                $udks = Udk::find()->orWhere(['LIKE', 'udk_code', $search])->orWhere(['LIKE', 'udk_name', $search]);
                $countUdks = clone $udks;
                $pages = new Pagination(['totalCount' => $countUdks->count(), 'pageSize' => 15]);
                return $this->render(
                    'udks', [
                        'udks' => $udks->offset($pages->offset)
                            ->limit($pages->limit)
                            ->all(),
                        'pages' => $pages
                    ]
                );
            case 'grnti':
                $grntis = Grnti::find()->orWhere(['LIKE', 'grnti_code', $search])->orWhere(['LIKE', 'grnti_name', $search]);

                $countGrntis = clone $grntis;
                $pages = new Pagination(['totalCount' => $countGrntis->count(), 'pageSize' => 15]);
                return $this->render(
                    'grntis', [
                        'grntis' => $grntis->offset($pages->offset)
                            ->limit($pages->limit)
                            ->all(),
                        'pages' => $pages
                    ]
                );
            case 'department':
                $departments = Department::find()->where(['LIKE', 'department_name', $search])->with('projects');

                $countDepartments = clone $departments;
                $pages = new Pagination(['totalCount' => $countDepartments->count(), 'pageSize' => 15]);
                return $this->render('departments', ['departments' => $departments->offset($pages->offset)
                        ->limit($pages->limit)
                        ->all(),
                        'pages' => $pages
                    ]
                );
            default:
                $projects = Project::find()->where(['LIKE', 'project_name', $search]);

                $countProjects = clone $projects;
                $pages = new Pagination(['totalCount' => $countProjects->count(), 'pageSize' => 15]);
                return $this->render('projects', ['projects' => $projects->offset($pages->offset)
                        ->limit($pages->limit)
                        ->all(),
                        'pages' => $pages
                    ]
                );
        }
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
    public function actionHello()
    {
        return $this->render('hello');
    }
}

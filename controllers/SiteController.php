<?php

namespace app\controllers;

//use GuzzleHttp\Psr7\UploadedFile;
use app\models\Department;
use app\models\Member;
use app\models\Udk;
use app\models\Grnti;
use app\models\UserIdentity;
use app\models\WorkOnProject;
use MongoDB\Driver\Query;
use Yii;
use yii\bootstrap\Html;
use yii\filters\AccessControl;
use yii\rbac\Item;
use yii\web\Controller;
use yii\web\Session;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ProjectAdd;
use app\models\Project;
use app\models\User;
use yii\data\Pagination;
//use yii\web\Session;

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
        return $this->render('index');
    }


/*
    public function actionProjectadd(){
        $model = new ProjectAdd();
        $name = '';
        $definition = '';
        if($model->load(Yii::$app->request->post()) && $model->validate()){
            $name = Html::encode($model->name);
            $definition = Html::encode($model->definition);
            $model->file = UploadedFile::getInstance($model, 'file');
            $model->file->saveAs('img/'.$model->file->baseName.'.'.$model->file->extension);

            return $this->goHome();
        }

        return $this->render('projectadd', [
            'model' => $model,
            'name' => Yii::$app->session->get('name')
        ]);
    }*/

    public function actionProject(){
        $name = Yii::$app->request->get('name');
        $project = Project::findOne(['project_name' => $name]);
        $users = $project->members;
        $users = Member::findAll(['member_id' => $users]);
        return $this->render('project', [
            'project' => $project,
            'udks' => $project->udks,
            'users' => $users,
        ]);
    }

    public function actionProjects(){
        $code = Yii::$app->request->get('dep_code') or '';
        $departments = Department::findAll(['department_parent_id' => $code]);

        if($departments == null){
            $department = Department::findOne(['department_id' => $code]);
            $projects = $department->getProjects();
            $pagination = new Pagination([
                'defaultPageSize' => 20,
                'totalCount' => $projects->count()
            ]);

            $projects = $projects->offset($pagination->offset)
                ->limit($pagination->limit)
                ->all();

            return $this->render('projects', [
                'title' => 'Проекты '.$department->department_name,
                'projects' => $projects,
                'pagination' => $pagination
            ]);
        }

        return $this->render('departments', [
            'title' => Department::findOne(['department_id' => $code])->department_name,
            'departments' => $departments,
//            'pagination' => $pagination
        ]);
    }

    public function actionUdks(){
        $code = Yii::$app->request->get('udk_code') or '';
        $udks = Udk::findAll(['udk_parent_id' => $code]);
        if($udks == null){
            $udk = Udk::findOne(['udk_id' => $code]);
            $projects = $udk->getProjects();
            $pagination = new Pagination([
                'defaultPageSize' => 20,
                'totalCount' => $projects->count()
            ]);

            $projects = $projects->offset($pagination->offset)
                ->limit($pagination->limit)
                ->all();

            return $this->render('projects', [
                'title' => 'Удк '.$udk->udk_code,
                'projects' => $projects,
                'pagination' => $pagination
            ]);
        }

        return $this->render('udks', [
            'title' => 'Удк '.Udk::findOne(['udk_id' => $code])->udk_code,
            'udks' => $udks
        ]);
    }
}

<?php

namespace app\controllers;

//use GuzzleHttp\Psr7\UploadedFile;
use Yii;
use yii\bootstrap\Html;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Session;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\ProjectAdd;
use app\models\Project;
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
            /*
             * Поиск пользователя в бд
             */
/*            if(){

            }*/

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
    }

    public function actionProject(){
        $name = Yii::$app->request->get('name');
        $model = new Project();
        $list = Project::find();

        $pagination = new Pagination([
            'defaultPageSize' => 2,
            'totalCount' => $list->count()
        ]);

        $list = $list->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        Yii::$app->session->set('name', $name);
        //$session = Yii::$app->session();
        //$session->set('name', $name);

        return $this->render('project', [
            'name' => $name,
            'list' => $list,
            'pagination' => $pagination
        ]);
    }
}

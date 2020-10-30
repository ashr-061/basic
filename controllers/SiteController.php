<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\dbUser;

use app\models\Jabatan;
use app\models\Antrian;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
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
     * {@inheritdoc}
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
     * @return Response|string
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

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
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

    public function actionHelloWorld(){
        $hello = "Hello ABCDEF";
        $jam = "jam";
        return $this->render('helloWorld',
            array(
                'hello' =>$hello,
                'waktu' =>$jam
            )
        );
    }


    public function actionDaftar(){
        $model = new dbUser;

        if($model->load(Yii::$app->request->post())&&$model->validate()){
            $model->save();
            Yii::$app->session->setFlash('success', 'Data tersimpan');
            return $this->redirect(['site/daftar']);
        }

        return $this->render('daftar', compact('model'));

    }

//this below is a junk code
    public function actionFormJabatan(){
        //halaman view ini memanggil variable dari model wilayah
        $model = new Jabatan;

        $dataWilayah = Jabatan::find()->all();

        if($model->load(Yii::$app->request->post())&&$model->validate()){
            $model->save();
            Yii::$app->session->setFlash('success', 'Data tersimpan');
            return $this->redirect(['site/form-jabatan']);
//            echo "sukses";
//            die();
        }
        return $this->render('formJabatan', compact('model', 'dataWilayah'));
    }

    public function actionAntrian(){
        $model = new Antrian;
        return $this->render('halamanAntrian', compact('model'));
    }
}

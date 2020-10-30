<?php

namespace app\controllers;

use Yii;
use app\models\Pegawai;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PegawaiController implements the CRUD actions for Pegawai model.
 */
class PegawaiController extends Controller{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Pegawai models.
     * @return mixed
     */
    public function actionIndex()
    {   
        //cek kalau sudah ada session atau belum
        if(Yii::$app->user->getIdentity()){
            $user_role = Yii::$app->user->identity->role;
            //jika role bukan admin maka disuruh kembali ke halaman awal
            if($user_role != 'Admin'){
                return $this->goHome();
            } else {
                //fungsi bawaan dari Gii
                $dataProvider = new ActiveDataProvider([
                    'query' => Pegawai::find(),
                ]);

                return $this->render('index', [
                    'dataProvider' => $dataProvider,
                ]);
            }
        } else {
            return $this->goHome();
        }

    }

    /**
     * Displays a single Pegawai model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if(Yii::$app->user->getIdentity()){
            $user_role = Yii::$app->user->identity->role;
            if($user_role != 'Admin'){
                return $this->goHome();
            } else {
                return $this->render('view', [
                    'model' => $this->findModel($id),
                ]);
            }
        } else {
            return $this->goHome();
        }
    }

    /**
     * Creates a new Pegawai model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->user->getIdentity()){
            $user_role = Yii::$app->user->identity->role;
            if($user_role != 'Admin'){
                return $this->goHome();
            } else {

                $model = new Pegawai();

                if ($model->load(Yii::$app->request->post()) && $model->save()) {
                    return $this->redirect(['view', 'id' => $model->id_pegawai]);
                }

                return $this->render('create', [
                    'model' => $model,
                ]);

            }
        } else {
            return $this->goHome();
        }
    }

    /**
     * Updates an existing Pegawai model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if(Yii::$app->user->getIdentity()){
            $user_role = Yii::$app->user->identity->role;
            if($user_role != 'Admin'){
                return $this->goHome();
            } else {

                $model = $this->findModel($id);

                if ($model->load(Yii::$app->request->post()) && $model->save()) {
                    return $this->redirect(['view', 'id' => $model->id_pegawai]);
                }

                return $this->render('update', [
                    'model' => $model,
                ]);

            }
        } else {
            return $this->goHome();
        }
    }

    /**
     * Deletes an existing Pegawai model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if(Yii::$app->user->getIdentity()){
            $user_role = Yii::$app->user->identity->role;
            if($user_role != 'Admin'){
                return $this->goHome();
            } else {

                $this->findModel($id)->delete();

                return $this->redirect(['index']);

            }
        } else {
            return $this->goHome();
        }
    }

    /**
     * Finds the Pegawai model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Pegawai the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if(Yii::$app->user->getIdentity()){
            $user_role = Yii::$app->user->identity->role;
            if($user_role != 'Admin'){
                return $this->goHome();
            } else {

                if (($model = Pegawai::findOne($id)) !== null) {
                    return $model;
                }

                throw new NotFoundHttpException('The requested page does not exist.');

            }
        } else {
            return $this->goHome();
        }

    }
}
    
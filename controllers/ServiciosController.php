<?php

namespace app\controllers;

use Yii;
use app\models\DefServicios;
use app\models\DefServiciosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ServiciosController implements the CRUD actions for DefServicios model.
 */
class ServiciosController extends Controller
{
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
     * Lists all DefServicios models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DefServiciosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single DefServicios model.
     * @param integer $iddef_servicios
     * @param integer $iddef_tipo_servicio
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($iddef_servicios, $iddef_tipo_servicio)
    {
        return $this->render('view', [
            'model' => $this->findModel($iddef_servicios, $iddef_tipo_servicio),
        ]);
    }

    /**
     * Creates a new DefServicios model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new DefServicios();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'iddef_servicios' => $model->iddef_servicios, 'iddef_tipo_servicio' => $model->iddef_tipo_servicio]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing DefServicios model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $iddef_servicios
     * @param integer $iddef_tipo_servicio
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($iddef_servicios, $iddef_tipo_servicio)
    {
        $model = $this->findModel($iddef_servicios, $iddef_tipo_servicio);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'iddef_servicios' => $model->iddef_servicios, 'iddef_tipo_servicio' => $model->iddef_tipo_servicio]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing DefServicios model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $iddef_servicios
     * @param integer $iddef_tipo_servicio
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($iddef_servicios, $iddef_tipo_servicio)
    {
        $this->findModel($iddef_servicios, $iddef_tipo_servicio)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the DefServicios model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $iddef_servicios
     * @param integer $iddef_tipo_servicio
     * @return DefServicios the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($iddef_servicios, $iddef_tipo_servicio)
    {
        if (($model = DefServicios::findOne(['iddef_servicios' => $iddef_servicios, 'iddef_tipo_servicio' => $iddef_tipo_servicio])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}

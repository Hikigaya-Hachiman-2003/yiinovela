<?php

namespace app\controllers;

use app\models\Tipos;
use app\models\TiposSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TiposController implements the CRUD actions for Tipos model.
 */
class TiposController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Tipos models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new TiposSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tipos model.
     * @param int $idtipos Idtipos
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idtipos)
    {
        return $this->render('view', [
            'model' => $this->findModel($idtipos),
        ]);
    }

    /**
     * Creates a new Tipos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Tipos();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idtipos' => $model->idtipos]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Tipos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idtipos Idtipos
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idtipos)
    {
        $model = $this->findModel($idtipos);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idtipos' => $model->idtipos]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Tipos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idtipos Idtipos
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idtipos)
    {
        $this->findModel($idtipos)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Tipos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idtipos Idtipos
     * @return Tipos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idtipos)
    {
        if (($model = Tipos::findOne(['idtipos' => $idtipos])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}

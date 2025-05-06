<?php

namespace app\controllers;

use app\models\Estudio;
use app\models\EstudioSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EstudioController implements the CRUD actions for Estudio model.
 */
class EstudioController extends Controller
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
     * Lists all Estudio models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new EstudioSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Estudio model.
     * @param int $idestudio Idestudio
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idestudio)
    {
        return $this->render('view', [
            'model' => $this->findModel($idestudio),
        ]);
    }

    /**
     * Creates a new Estudio model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Estudio();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idestudio' => $model->idestudio]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Estudio model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idestudio Idestudio
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idestudio)
    {
        $model = $this->findModel($idestudio);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idestudio' => $model->idestudio]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Estudio model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idestudio Idestudio
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idestudio)
    {
        $this->findModel($idestudio)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Estudio model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idestudio Idestudio
     * @return Estudio the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idestudio)
    {
        if (($model = Estudio::findOne(['idestudio' => $idestudio])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}

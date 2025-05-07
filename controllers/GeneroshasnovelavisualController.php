<?php

namespace app\controllers;

use app\models\GenerosHasNovelaVisual;
use app\models\GeneroshasnovelavisualSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * GeneroshasnovelavisualController implements the CRUD actions for GenerosHasNovelaVisual model.
 */
class GeneroshasnovelavisualController extends Controller
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
     * Lists all GenerosHasNovelaVisual models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new GeneroshasnovelavisualSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single GenerosHasNovelaVisual model.
     * @param int $generos_idgeneros Generos Idgeneros
     * @param int $novela_visual_idnovela_visual Novela Visual Idnovela Visual
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($generos_idgeneros, $novela_visual_idnovela_visual)
    {
        return $this->render('view', [
            'model' => $this->findModel($generos_idgeneros, $novela_visual_idnovela_visual),
        ]);
    }

    /**
     * Creates a new GenerosHasNovelaVisual model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new GenerosHasNovelaVisual();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'generos_idgeneros' => $model->generos_idgeneros, 'novela_visual_idnovela_visual' => $model->novela_visual_idnovela_visual]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing GenerosHasNovelaVisual model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $generos_idgeneros Generos Idgeneros
     * @param int $novela_visual_idnovela_visual Novela Visual Idnovela Visual
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($generos_idgeneros, $novela_visual_idnovela_visual)
    {
        $model = $this->findModel($generos_idgeneros, $novela_visual_idnovela_visual);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'generos_idgeneros' => $model->generos_idgeneros, 'novela_visual_idnovela_visual' => $model->novela_visual_idnovela_visual]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing GenerosHasNovelaVisual model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $generos_idgeneros Generos Idgeneros
     * @param int $novela_visual_idnovela_visual Novela Visual Idnovela Visual
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($generos_idgeneros, $novela_visual_idnovela_visual)
    {
        $this->findModel($generos_idgeneros, $novela_visual_idnovela_visual)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the GenerosHasNovelaVisual model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $generos_idgeneros Generos Idgeneros
     * @param int $novela_visual_idnovela_visual Novela Visual Idnovela Visual
     * @return GenerosHasNovelaVisual the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($generos_idgeneros, $novela_visual_idnovela_visual)
    {
        if (($model = GenerosHasNovelaVisual::findOne(['generos_idgeneros' => $generos_idgeneros, 'novela_visual_idnovela_visual' => $novela_visual_idnovela_visual])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}

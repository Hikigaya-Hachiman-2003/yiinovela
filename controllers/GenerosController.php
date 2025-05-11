<?php

namespace app\controllers;

use Yii;
use app\models\Generos;
use app\models\GenerosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * GenerosController implements the CRUD actions for Generos model.
 */
class GenerosController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'access' => [
                'class' => \yii\filters\AccessControl::class,
                'only' => ['index', 'view', 'create', 'update', 'delete'],
                'rules' => [
                    // Acceso para usuarios autenticados con rol 'user'
                    [
                        'allow' => true,
                        'actions' => ['index', 'view'],
                        'roles' => ['@'],
                        'matchCallback' => function($rule, $action){
                            return Yii::$app->user->identity->role == 'user';
                        }
                    ],
                    // Acceso completo para usuarios con rol 'admin'
                    [
                        'allow' => true,
                        'actions' => ['index', 'view', 'create', 'update', 'delete'],
                        'roles' => ['@'],
                        'matchCallback' => function($rule, $action){
                            return Yii::$app->user->identity->role == 'admin';
                        }
                    ],
                    // Bloquear todo lo demás explícitamente
                    [
                        'allow' => false,
                    ],
                ],
            ],
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
     * Lists all Generos models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new GenerosSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Generos model.
     * @param int $idgeneros Idgeneros
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idgeneros)
    {
        return $this->render('view', [
            'model' => $this->findModel($idgeneros),
        ]);
    }

    /**
     * Creates a new Generos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Generos();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idgeneros' => $model->idgeneros]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Generos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idgeneros Idgeneros
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idgeneros)
    {
        $model = $this->findModel($idgeneros);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idgeneros' => $model->idgeneros]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Generos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idgeneros Idgeneros
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idgeneros)
    {
        $this->findModel($idgeneros)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Generos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idgeneros Idgeneros
     * @return Generos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idgeneros)
    {
        if (($model = Generos::findOne(['idgeneros' => $idgeneros])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}

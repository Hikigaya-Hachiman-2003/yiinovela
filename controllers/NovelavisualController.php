<?php

namespace app\controllers;

use app\models\Novelavisual;
use app\models\NovelavisualSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\web\UploadedFile;

/**
 * NovelavisualController implements the CRUD actions for Novelavisual model.
 */
class NovelavisualController extends Controller
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
     * Lists all Novelavisual models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new NovelavisualSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Novelavisual model.
     * @param int $idnovela_visual Idnovela Visual
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idnovela_visual)
    {
        return $this->render('view', [
            'model' => $this->findModel($idnovela_visual),
        ]);
    }

    /**
     * Creates a new Novelavisual model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Novelavisual();
        $message = '';

        if ($this->request->isPost) {
            $transaction = Yii::$app->db->beginTransaction();
            try{
                if($model->load($this->request->post())){
                    $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
                    if($model->save() && (!$model->imageFile || $model->upload())){
                        $transaction->commit();
                        return $this->redirect(['view', 'idnovela_visual' => $model->idnovela_visual]);
                    }else{
                        $message = 'Error al guardar la Novela Visual';
                        $transaction->rollBack();
                    }
                }else{
                    $message = 'Error al cargar la Novela Visual';
                    $transaction->rollBack();
                }
            }catch(\Exception $e){
                $transaction->rollBack();
                $message = 'Error al guardar la Novela Visual'; 
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'message' => $message,
        ]);
    }

    /**
     * Updates an existing Novelavisual model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idnovela_visual Idnovela Visual
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idnovela_visual)
    {
        $model = $this->findModel($idnovela_visual);
        $message = '';
        if($this->request->isPost && $model->load($this->request->post())){
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');

            if($model->save() && (!$model->imageFile || $model->upload())){
                return $this->redirect(['view', 'idnovela_visual' => $model->idnovela_visual]);
            }else{
                $message = 'Error al guardar la pelicula';
            }
        }

        $model->genders = ArrayHelper::getColumn($model->getGenerosIdgeneros()->asArray()->all(), 'idgeneros');

        return $this->render('update', [
            'model' => $model,
            'message' => $message,
        ]);
    }

    /**
     * Deletes an existing Novelavisual model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idnovela_visual Idnovela Visual
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idnovela_visual)
    {
        $model = $this->findModel($idnovela_visual);
        $model->deletePortada();
        $model->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the Novelavisual model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idnovela_visual Idnovela Visual
     * @return Novelavisual the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idnovela_visual)
    {
        if (($model = Novelavisual::findOne(['idnovela_visual' => $idnovela_visual])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}

<?php

use app\models\Estudio;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\EstudioSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Estudios');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estudio-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Estudio'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idestudio',
            'nombre',
            'país',
            'fundación',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Estudio $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idestudio' => $model->idestudio]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>

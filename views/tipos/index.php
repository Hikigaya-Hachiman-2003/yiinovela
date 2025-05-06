<?php

use app\models\Tipos;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\TiposSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Tipos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipos-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Tipos'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idtipos',
            'nombre',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Tipos $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idtipos' => $model->idtipos]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>

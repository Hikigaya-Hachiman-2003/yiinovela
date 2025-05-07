<?php

use app\models\GenerosHasNovelaVisual;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\GeneroshasnovelavisualSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Generos Has Novela Visuals');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="generos-has-novela-visual-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Generos Has Novela Visual'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'generos_idgeneros',
            'novela_visual_idnovela_visual',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, GenerosHasNovelaVisual $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'generos_idgeneros' => $model->generos_idgeneros, 'novela_visual_idnovela_visual' => $model->novela_visual_idnovela_visual]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>

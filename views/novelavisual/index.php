<?php

use app\models\Novelavisual;
use yii\base\Model;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\models\NovelavisualSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Novelavisuals');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="novelavisual-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Novelavisual'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'idnovela_visual',
            //'portada',
            [
                'attribute' => 'portada',
                'format' => 'html',
                'value' => function(Novelavisual $model){
                    if($model->portada)
                        return Html::img(Yii::getAlias('@web') . '/portadas/' . $model->portada, ['style' => 'width: 200px']);
                    return null;
                    }
            ],
            'nombre',
            'descripción',
            'tipos_idtipos',
            'estudio_idestudio',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Novelavisual $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idnovela_visual' => $model->idnovela_visual]);
                }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
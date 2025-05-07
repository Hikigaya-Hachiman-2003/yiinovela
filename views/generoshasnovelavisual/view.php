<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\GenerosHasNovelaVisual $model */

$this->title = $model->generos_idgeneros;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Generos Has Novela Visuals'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="generos-has-novela-visual-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'generos_idgeneros' => $model->generos_idgeneros, 'novela_visual_idnovela_visual' => $model->novela_visual_idnovela_visual], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'generos_idgeneros' => $model->generos_idgeneros, 'novela_visual_idnovela_visual' => $model->novela_visual_idnovela_visual], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'generos_idgeneros',
            'novela_visual_idnovela_visual',
        ],
    ]) ?>

</div>

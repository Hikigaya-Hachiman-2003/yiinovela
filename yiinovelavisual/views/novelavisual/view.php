<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Novelavisual $model */

$this->title = $model->idnovela_visual;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Novelavisuals'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="novelavisual-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'idnovela_visual' => $model->idnovela_visual], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'idnovela_visual' => $model->idnovela_visual], [
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
            'idnovela_visual',
            'nombre',
            'descripción',
            'tipos_idtipos',
            'estudio_idestudio',
        ],
    ]) ?>

</div>

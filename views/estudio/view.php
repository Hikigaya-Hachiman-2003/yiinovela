<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Estudio $model */

$this->title = $model->idestudio;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Estudios'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="estudio-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'idestudio' => $model->idestudio], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'idestudio' => $model->idestudio], [
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
            'idestudio',
            'portada',
            'nombre',
            'descripcion',
            'país',
            'fundación',
        ],
    ]) ?>

    <h2 class="mt-5">Novelas Visuales del Estudio</h2>

    <?php if ($model->novelaVisuals): ?>
        <div class="row row-cols-1 row-cols-md-3 g-4 mt-2">
            <?php foreach ($model->novelaVisuals as $novela): ?>
                <div class="col">
                    <div class="card h-100">
                        <img src="<?= !empty($novela->portada) ? Yii::getAlias('@web/portadas/' . $novela->portada) : Yii::getAlias('@web/portadas/default-portada.png') ?>" class="card-img-top" alt="<?= Html::encode($novela->nombre) ?>" style="height: 250px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title"><?= Html::encode($novela->nombre) ?></h5>
                            <p class="card-text"><?= Html::encode($novela->descripción) ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p class="text-muted">Este estudio aún no tiene novelas visuales registradas.</p>
    <?php endif; ?>

</div>
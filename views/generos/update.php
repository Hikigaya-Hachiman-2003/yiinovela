<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Generos $model */

$this->title = Yii::t('app', 'Update Generos: {name}', [
    'name' => $model->idgeneros,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Generos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idgeneros, 'url' => ['view', 'idgeneros' => $model->idgeneros]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="generos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

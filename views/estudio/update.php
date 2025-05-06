<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Estudio $model */

$this->title = Yii::t('app', 'Update Estudio: {name}', [
    'name' => $model->idestudio,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Estudios'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idestudio, 'url' => ['view', 'idestudio' => $model->idestudio]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="estudio-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

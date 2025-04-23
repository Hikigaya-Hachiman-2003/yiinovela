<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Novelavisual $model */

$this->title = Yii::t('app', 'Update Novelavisual: {name}', [
    'name' => $model->idnovela_visual,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Novelavisuals'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idnovela_visual, 'url' => ['view', 'idnovela_visual' => $model->idnovela_visual]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="novelavisual-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Tipos $model */

$this->title = Yii::t('app', 'Update Tipos: {name}', [
    'name' => $model->idtipos,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tipos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idtipos, 'url' => ['view', 'idtipos' => $model->idtipos]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="tipos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

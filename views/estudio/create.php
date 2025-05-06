<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Estudio $model */

$this->title = Yii::t('app', 'Create Estudio');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Estudios'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estudio-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

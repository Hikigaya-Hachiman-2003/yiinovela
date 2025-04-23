<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Novelavisual $model */

$this->title = Yii::t('app', 'Create Novelavisual');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Novelavisuals'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="novelavisual-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

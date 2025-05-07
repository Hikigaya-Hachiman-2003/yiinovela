<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\GenerosHasNovelaVisual $model */

$this->title = Yii::t('app', 'Create Generos Has Novela Visual');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Generos Has Novela Visuals'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="generos-has-novela-visual-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

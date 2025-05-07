<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\GenerosHasNovelaVisual $model */

$this->title = Yii::t('app', 'Update Generos Has Novela Visual: {name}', [
    'name' => $model->generos_idgeneros,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Generos Has Novela Visuals'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->generos_idgeneros, 'url' => ['view', 'generos_idgeneros' => $model->generos_idgeneros, 'novela_visual_idnovela_visual' => $model->novela_visual_idnovela_visual]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="generos-has-novela-visual-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

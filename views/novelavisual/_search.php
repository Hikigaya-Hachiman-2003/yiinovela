<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\NovelavisualSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="novelavisual-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'idnovela_visual') ?>

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'descripción') ?>

    <?= $form->field($model, 'tipos_idtipos') ?>

    <?= $form->field($model, 'estudio_idestudio') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

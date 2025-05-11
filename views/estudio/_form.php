<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Estudio $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="estudio-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'portada')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'país')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fundación')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

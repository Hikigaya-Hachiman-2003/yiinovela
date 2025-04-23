<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Novelavisual $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="novelavisual-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descripción')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tipos_idtipos')->textInput() ?>

    <?= $form->field($model, 'estudio_idestudio')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\GenerosHasNovelaVisual $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="generos-has-novela-visual-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'generos_idgeneros')->textInput() ?>

    <?= $form->field($model, 'novela_visual_idnovela_visual')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

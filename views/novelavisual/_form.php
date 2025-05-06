<?php

use app\models\Estudio;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Tipos;

/** @var yii\web\View $this */
/** @var app\models\Novelavisual $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="novelavisual-form">

    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data']
    ]); ?>

    <?php if ($model->portada): ?>
        <div class="from-group">
            <?= Html::label('Imagen Actual') ?>
            <div>
                <?= Html::img(Yii::getAlias('@web') . '/portadas/' . $model->portada, ['style' => 'width: 200px']) ?>
            </div>
        </div>
    <?php endif; ?>

    <?php //$form->field($model, 'portada')->textInput(['maxlength' => true]) 
    ?>

    <?=
    $form->field($model, 'imageFile')->fileInput()->label('Selecionar portada') ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true, 'placeholder'=>'Nombre de la Novela Visual', 'required'=> true]) ?>

    <?= $form->field($model, 'descripción')->textarea(['maxlength' =>600, 'placeholder'=>'Ingrese la descripción...', 'require'=>true]) ?>

    <?= $form->field($model, 'tipos_idtipos')->dropDownList(ArrayHelper::map(Tipos::find()->select(['idtipos', 'nombre'])
                                                                                        ->orderBy('nombre')
                                                                                        ->asArray()
                                                                                        ->all(), 'idtipos', 'nombre'), ['prompt'=>'Selecione un Tipo de Novela', 'required'=>true]) 
    ?>

    <?= $form->field($model, 'estudio_idestudio')->dropDownList(ArrayHelper::map(Estudio::find()->select(['idestudio', 'nombre'])
                                                                                        ->orderBy('nombre')
                                                                                        ->asArray()
                                                                                        ->all(), 'idestudio', 'nombre'), ['prompt'=>'Selecione un Estudio', 'required'=>true]) 
    ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
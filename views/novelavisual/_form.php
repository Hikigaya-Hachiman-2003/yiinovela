<?php

use app\models\Estudio;
use app\models\Generos;
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

    <?= $form->field($model, 'imageFile')->fileInput()->label('Selecionar portada') ?>

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

    <div class="mb-3">
        <?= Html::label('Selecione los generos', 'genders-search', ['class' =>'form-label']) ?>
        <div class="input-group">
            <input type="text" id= "genders-search" placeholder="Buscar genero..." class="form-control"> 
            <a href="<?= Yii::$app->urlManager->createUrl(['generos/create'])?>" class="btn btn-secondary">
            <i class="bi bi-bookmark-plus"></i>
                Nuevo Genero
            </a>
        </div>
        <?= Html::activeListBox($model, 'genders', ArrayHelper::map(Generos::find()->orderBy(['nombre'=>SORT_ASC])->all(),
                                    'idgeneros', function($gender){
                                        return $gender->nombre;
                                    }), ['multiple'=>true, 'size'=>10, 'id'=>'genders-select', 'class'=>'form-control mt-2']) ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


<script>
    document.querySelector("#genders-search").addEventListener('input', function(){
        let genders = document.querySelectorAll("#genders-select option");
        genders.forEach(genders =>{
            if(genders.text.toLowerCase().includes(this.value.toLowerCase())){
                genders.style.display = 'block';
            }else{
                genders.style.display = 'none';
            }
        });
    });
</script>
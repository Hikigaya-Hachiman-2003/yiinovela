<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "novela_visual".
 *
 * @property int $idnovela_visual
 * @property string|null $nombre
 * @property string|null $descripción
 * @property int $tipos_idtipos
 * @property int $estudio_idestudio
 *
 * @property Estudio $estudioIdestudio
 * @property GenerosHasNovelaVisual[] $generosHasNovelaVisuals
 * @property Generos[] $generosIdgeneros
 * @property Tipos $tiposIdtipos
 */
class Novelavisual extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'novela_visual';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'descripción'], 'default', 'value' => null],
            [['tipos_idtipos', 'estudio_idestudio'], 'required'],
            [['tipos_idtipos', 'estudio_idestudio'], 'integer'],
            [['nombre'], 'string', 'max' => 150],
            [['descripción'], 'string', 'max' => 600],
            [['estudio_idestudio'], 'exist', 'skipOnError' => true, 'targetClass' => Estudio::class, 'targetAttribute' => ['estudio_idestudio' => 'idestudio']],
            [['tipos_idtipos'], 'exist', 'skipOnError' => true, 'targetClass' => Tipos::class, 'targetAttribute' => ['tipos_idtipos' => 'idtipos']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idnovela_visual' => Yii::t('app', 'Idnovela Visual'),
            'nombre' => Yii::t('app', 'Nombre'),
            'descripción' => Yii::t('app', 'Descripción'),
            'tipos_idtipos' => Yii::t('app', 'Tipos Idtipos'),
            'estudio_idestudio' => Yii::t('app', 'Estudio Idestudio'),
        ];
    }

    /**
     * Gets query for [[EstudioIdestudio]].
     *
     * @return \yii\db\ActiveQuery|EstudioQuery
     */
    public function getEstudioIdestudio()
    {
        return $this->hasOne(Estudio::class, ['idestudio' => 'estudio_idestudio']);
    }

    /**
     * Gets query for [[GenerosHasNovelaVisuals]].
     *
     * @return \yii\db\ActiveQuery|GenerosHasNovelaVisualQuery
     */
    public function getGenerosHasNovelaVisuals()
    {
        return $this->hasMany(GenerosHasNovelaVisual::class, ['novela_visual_idnovela_visual' => 'idnovela_visual']);
    }

    /**
     * Gets query for [[GenerosIdgeneros]].
     *
     * @return \yii\db\ActiveQuery|GenerosQuery
     */
    public function getGenerosIdgeneros()
    {
        return $this->hasMany(Generos::class, ['idgeneros' => 'generos_idgeneros'])->viaTable('generos_has_novela_visual', ['novela_visual_idnovela_visual' => 'idnovela_visual']);
    }

    /**
     * Gets query for [[TiposIdtipos]].
     *
     * @return \yii\db\ActiveQuery|TiposQuery
     */
    public function getTiposIdtipos()
    {
        return $this->hasOne(Tipos::class, ['idtipos' => 'tipos_idtipos']);
    }

    /**
     * {@inheritdoc}
     * @return NovelavisualQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new NovelavisualQuery(get_called_class());
    }

}

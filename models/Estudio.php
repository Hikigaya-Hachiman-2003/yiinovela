<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "estudio".
 *
 * @property int $idestudio
 * @property string|null $nombre
 * @property string|null $país
 * @property string|null $fundación
 *
 * @property NovelaVisual[] $novelaVisuals
 */
class Estudio extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'estudio';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['portada','nombre', 'descripcion', 'país', 'fundación'], 'default', 'value' => null],
            [['nombre'], 'string', 'max' => 100],
            [['país', 'fundación'], 'string', 'max' => 45],
            [['descripcion'], 'string', 'max' => 300],
            [['portada'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idestudio' => Yii::t('app', 'Idestudio'),
            'portada' => Yii::t('app', 'Portada'),
            'nombre' => Yii::t('app', 'Nombre'),
            'descripcion' => Yii::t('app', 'Descripción'),
            'país' => Yii::t('app', 'País'),
            'fundación' => Yii::t('app', 'Fundación'),
        ];
    }

    /**
     * Gets query for [[NovelaVisuals]].
     *
     * @return \yii\db\ActiveQuery|NovelavisualQuery
     */
    public function getNovelaVisuals()
    {
        return $this->hasMany(NovelaVisual::class, ['estudio_idestudio' => 'idestudio']);
    }

    /**
     * {@inheritdoc}
     * @return EstudioQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EstudioQuery(get_called_class());
    }

}

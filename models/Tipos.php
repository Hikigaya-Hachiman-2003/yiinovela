<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipos".
 *
 * @property int $idtipos
 * @property string|null $nombre
 *
 * @property NovelaVisual[] $novelaVisuals
 */
class Tipos extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tipos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre'], 'default', 'value' => null],
            [['nombre'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idtipos' => Yii::t('app', 'Idtipos'),
            'nombre' => Yii::t('app', 'Nombre'),
        ];
    }

    /**
     * Gets query for [[NovelaVisuals]].
     *
     * @return \yii\db\ActiveQuery|NovelavisualQuery
     */
    public function getNovelaVisuals()
    {
        return $this->hasMany(NovelaVisual::class, ['tipos_idtipos' => 'idtipos']);
    }

    /**
     * {@inheritdoc}
     * @return TiposQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TiposQuery(get_called_class());
    }

}

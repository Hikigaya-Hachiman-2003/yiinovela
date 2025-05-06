<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "generos".
 *
 * @property int $idgeneros
 * @property string|null $nombre
 *
 * @property GenerosHasNovelaVisual[] $generosHasNovelaVisuals
 * @property NovelaVisual[] $novelaVisualIdnovelaVisuals
 */
class Generos extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'generos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre'], 'default', 'value' => null],
            [['nombre'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idgeneros' => Yii::t('app', 'Idgeneros'),
            'nombre' => Yii::t('app', 'Nombre'),
        ];
    }

    /**
     * Gets query for [[GenerosHasNovelaVisuals]].
     *
     * @return \yii\db\ActiveQuery|GenerosHasNovelaVisualQuery
     */
    public function getGenerosHasNovelaVisuals()
    {
        return $this->hasMany(GenerosHasNovelaVisual::class, ['generos_idgeneros' => 'idgeneros']);
    }

    /**
     * Gets query for [[NovelaVisualIdnovelaVisuals]].
     *
     * @return \yii\db\ActiveQuery|NovelavisualQuery
     */
    public function getNovelaVisualIdnovelaVisuals()
    {
        return $this->hasMany(NovelaVisual::class, ['idnovela_visual' => 'novela_visual_idnovela_visual'])->viaTable('generos_has_novela_visual', ['generos_idgeneros' => 'idgeneros']);
    }

    /**
     * {@inheritdoc}
     * @return GenerosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new GenerosQuery(get_called_class());
    }

}

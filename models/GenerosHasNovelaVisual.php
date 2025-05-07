<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "generos_has_novela_visual".
 *
 * @property int $generos_idgeneros
 * @property int $novela_visual_idnovela_visual
 *
 * @property Generos $generosIdgeneros
 * @property NovelaVisual $novelaVisualIdnovelaVisual
 */
class GenerosHasNovelaVisual extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'generos_has_novela_visual';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['generos_idgeneros', 'novela_visual_idnovela_visual'], 'required'],
            [['generos_idgeneros', 'novela_visual_idnovela_visual'], 'integer'],
            [['generos_idgeneros', 'novela_visual_idnovela_visual'], 'unique', 'targetAttribute' => ['generos_idgeneros', 'novela_visual_idnovela_visual']],
            [['generos_idgeneros'], 'exist', 'skipOnError' => true, 'targetClass' => Generos::class, 'targetAttribute' => ['generos_idgeneros' => 'idgeneros']],
            [['novela_visual_idnovela_visual'], 'exist', 'skipOnError' => true, 'targetClass' => NovelaVisual::class, 'targetAttribute' => ['novela_visual_idnovela_visual' => 'idnovela_visual']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'generos_idgeneros' => Yii::t('app', 'Generos Idgeneros'),
            'novela_visual_idnovela_visual' => Yii::t('app', 'Novela Visual Idnovela Visual'),
        ];
    }

    /**
     * Gets query for [[GenerosIdgeneros]].
     *
     * @return \yii\db\ActiveQuery|GenerosQuery
     */
    public function getGenerosIdgeneros()
    {
        return $this->hasOne(Generos::class, ['idgeneros' => 'generos_idgeneros']);
    }

    /**
     * Gets query for [[NovelaVisualIdnovelaVisual]].
     *
     * @return \yii\db\ActiveQuery|NovelavisualQuery
     */
    public function getNovelaVisualIdnovelaVisual()
    {
        return $this->hasOne(NovelaVisual::class, ['idnovela_visual' => 'novela_visual_idnovela_visual']);
    }

    /**
     * {@inheritdoc}
     * @return GenerosHasNovelaVisualQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new GenerosHasNovelaVisualQuery(get_called_class());
    }

}

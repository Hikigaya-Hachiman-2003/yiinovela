<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "novela_visual".
 *
 * @property int $idnovela_visual
 * @property string|null $portada
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
    public $imageFile;
    public $genders = [];

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
            [['portada', 'nombre', 'descripción'], 'default', 'value' => null],
            [['tipos_idtipos', 'estudio_idestudio'], 'required'],
            [['tipos_idtipos', 'estudio_idestudio'], 'integer'],
            [['portada'], 'string', 'max' => 255],
            [['nombre'], 'string', 'max' => 150],
            [['descripción'], 'string', 'max' => 600],
            [['genders'], 'each', 'rule' => ['integer']], //datos de generos
            [['estudio_idestudio'], 'exist', 'skipOnError' => true, 'targetClass' => Estudio::class, 'targetAttribute' => ['estudio_idestudio' => 'idestudio']],
            [['tipos_idtipos'], 'exist', 'skipOnError' => true, 'targetClass' => Tipos::class, 'targetAttribute' => ['tipos_idtipos' => 'idtipos']],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idnovela_visual' => Yii::t('app', 'Idnovela Visual'),
            'portada' => Yii::t('app', 'Portada'),
            'nombre' => Yii::t('app', 'Nombre'),
            'descripción' => Yii::t('app', 'Descripción'),
            'tipos_idtipos' => Yii::t('app', 'Tipos'),
            'estudio_idestudio' => Yii::t('app', 'Estudio'),
            'genders' => 'Generos'
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            if ($this->isNewRecord) {
                if (!$this->save(false)) {
                    return false;
                }
            }

            if ($this->imageFile instanceof UploadedFile) {
                // Sanitiza el nombre base y agrega un prefijo único
                $sanitizedBaseName = preg_replace('/[^a-zA-Z0-9_\-]/', '_', $this->imageFile->baseName);
                $filename = uniqid() . '_' . $sanitizedBaseName . '.' . $this->imageFile->extension;
                $path = Yii::getAlias('@webroot/portadas/') . $filename;

                if ($this->imageFile->saveAs($path)) {
                    if ($this->portada && $this->portada !== $filename) {
                        $this->deletePortada();
                    }

                    $this->portada = $filename;
                }
            }

            return $this->save(false);
        }

        return false;
    }


    public function deletePortada()
    {
        $path = Yii::getAlias('@webroot/portadas/') . $this->portada;
        if (file_exists($path)) {
            unlink($path);
        }
    }

    public function afterSave($insert, $changedAttributes){
        parent::afterSave($insert, $changedAttributes);
        
        if(is_array($this->genders)){
            foreach($this->genders as $generoId){
                $generosHasNovelaVisuals = new GenerosHasNovelaVisual();
                $generosHasNovelaVisuals->generos_idgeneros = $generoId;
                $generosHasNovelaVisuals->novela_visual_idnovela_visual = $this->idnovela_visual;
                $generosHasNovelaVisuals->save();
            }
        }
    }

    public function beforeDelete(){
        if(!parent::beforeDelete()){
            return false;
        }

        GenerosHasNovelaVisual::deleteAll(['novela_visual_idnovela_visual' => $this->idnovela_visual]);

        return true;
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
    /** */   public function getGenerosHasNovelaVisuals()
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

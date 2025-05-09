<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Novelavisual;

/**
 * NovelavisualSearch represents the model behind the search form of `app\models\Novelavisual`.
 */
class NovelavisualSearch extends Novelavisual
{
    
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idnovela_visual', 'tipos_idtipos', 'estudio_idestudio'], 'integer'],
            [['portada', 'nombre', 'descripción'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     * @param string|null $formName Form name to be used into `->load()` method.
     *
     * @return ActiveDataProvider
     */
    public function search($params, $formName = null)
    {
        $query = Novelavisual::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params, $formName);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'idnovela_visual' => $this->idnovela_visual,
            'tipos_idtipos' => $this->tipos_idtipos,
            'estudio_idestudio' => $this->estudio_idestudio,
        ]);

        $query->andFilterWhere(['like', 'portada', $this->portada])
            ->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'descripción', $this->descripción]);

        return $dataProvider;
    }
}

<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Estudio;

/**
 * EstudioSearch represents the model behind the search form of `app\models\Estudio`.
 */
class EstudioSearch extends Estudio
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idestudio'], 'integer'],
            [['portada','nombre', 'descripcion', 'país', 'fundación'], 'safe'],
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
        $query = Estudio::find();

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
            'idestudio' => $this->idestudio,
        ]);

        $query->andFilterWhere(['like', 'portada', $this->portada])
            ->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'país', $this->país])
            ->andFilterWhere(['like', 'fundación', $this->fundación]);

        return $dataProvider;
    }
}

<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\GenerosHasNovelaVisual;

/**
 * GeneroshasnovelavisualSearch represents the model behind the search form of `app\models\GenerosHasNovelaVisual`.
 */
class GeneroshasnovelavisualSearch extends GenerosHasNovelaVisual
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['generos_idgeneros', 'novela_visual_idnovela_visual'], 'integer'],
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
        $query = GenerosHasNovelaVisual::find();

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
            'generos_idgeneros' => $this->generos_idgeneros,
            'novela_visual_idnovela_visual' => $this->novela_visual_idnovela_visual,
        ]);

        return $dataProvider;
    }
}

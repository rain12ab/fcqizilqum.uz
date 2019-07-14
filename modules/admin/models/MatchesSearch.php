<?php

namespace app\modules\admin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Matches;

/**
 * MatchesSearch represents the model behind the search form of `app\modules\admin\models\Matches`.
 */
class MatchesSearch extends Matches
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'guest_team', 'home_team', 'date', 'status'], 'integer'],
            [['stadion'], 'string'],
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
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Matches::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'guest_team' => $this->guest_team,
            'home_team' => $this->home_team,
            'date' => $this->date,
            'status' => $this->status,
            'region_id' => $this->region_id,
            'stadion' => $this->stadion,
        ]);

        return $dataProvider;
    }
}

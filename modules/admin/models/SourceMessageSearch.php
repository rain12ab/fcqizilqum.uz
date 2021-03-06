<?php

namespace app\modules\admin\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SourceMessage;
use yii\data\Sort;

/**
 * SourceMessageSearch represents the model behind the search form about `app\models\SourceMessage`.
 */
class SourceMessageSearch extends SourceMessage
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id','page_size'], 'integer'],
            [['category', 'message'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = SourceMessage::find();

        $sort = new Sort();

        $sort->defaultOrder = ['id'=>SORT_DESC];
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=>$sort,
            'pagination'=>[
                'pageSize'=>(isset($params['SourceMessageSearch']['page_size']) and $params['SourceMessageSearch']['page_size']>=20)?$params['SourceMessageSearch']['page_size']:20
            ]
        ]);


        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'category', $this->category])
            ->andFilterWhere(['like', 'message', $this->message]);

        return $dataProvider;
    }
}

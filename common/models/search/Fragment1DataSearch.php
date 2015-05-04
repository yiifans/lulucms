<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Fragment1Data;

/**
 * Fragment1DataSearch represents the model behind the search form about `common\models\Fragment1Data`.
 */
class Fragment1DataSearch extends Fragment1Data
{
    public function rules()
    {
        return [
            [['id', 'fragment_id', 'sort_num'], 'integer'],
            [['data'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Fragment1Data::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'fragment_id' => $this->fragment_id,
            'sort_num' => $this->sort_num,
        ]);

        $query->andFilterWhere(['like', 'data', $this->data]);

        return $dataProvider;
    }
}

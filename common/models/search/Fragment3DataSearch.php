<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Fragment3Data;

/**
 * Fragment3DataSearch represents the model behind the search form about `common\models\Fragment3Data`.
 */
class Fragment3DataSearch extends Fragment3Data
{
    public function rules()
    {
        return [
            [['id', 'fragment_id', 'channel_id', 'content_id', 'sort_num'], 'integer'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Fragment3Data::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'fragment_id' => $this->fragment_id,
            'channel_id' => $this->channel_id,
            'content_id' => $this->content_id,
            'sort_num' => $this->sort_num,
        ]);

        return $dataProvider;
    }
}

<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Fragment2Data;

/**
 * Fragment2DataSearch represents the model behind the search form about `common\models\Fragment2Data`.
 */
class Fragment2DataSearch extends Fragment2Data
{
    public function rules()
    {
        return [
            [['id', 'fragment_id', 'sort_num'], 'integer'],
            [['title', 'title_format', 'title_pic', 'url', 'sub_title', 'summary', 'publish_time'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Fragment2Data::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'fragment_id' => $this->fragment_id,
            'publish_time' => $this->publish_time,
            'sort_num' => $this->sort_num,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'title_format', $this->title_format])
            ->andFilterWhere(['like', 'title_pic', $this->title_pic])
            ->andFilterWhere(['like', 'url', $this->url])
            ->andFilterWhere(['like', 'sub_title', $this->sub_title])
            ->andFilterWhere(['like', 'summary', $this->summary]);

        return $dataProvider;
    }
}

<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Dict;

/**
 * DictSearch represents the model behind the search form about `common\models\Dict`.
 */
class DictSearch extends Dict
{
    public function rules()
    {
        return [
            [['id', 'parent_id', 'sort_num'], 'integer'],
            [['category_key', 'name', 'value', 'datatype'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Dict::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'parent_id' => $this->parent_id,
            'sort_num' => $this->sort_num,
        ]);

        $query->andFilterWhere(['like', 'category_key', $this->category_key])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'value', $this->value])
            ->andFilterWhere(['like', 'datatype', $this->datatype]);

        return $dataProvider;
    }
}

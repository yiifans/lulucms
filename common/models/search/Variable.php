<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Variable as VariableModel;

/**
 * Variable represents the model behind the search form about `common\models\Variable`.
 */
class Variable extends VariableModel
{
    public function rules()
    {
        return [
            [['variable', 'name', 'value', 'description'], 'safe'],
            [['data_type', 'is_cache', 'sort_num'], 'integer'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = VariableModel::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'data_type' => $this->data_type,
            'is_cache' => $this->is_cache,
            'sort_num' => $this->sort_num,
        ]);

        $query->andFilterWhere(['like', 'variable', $this->variable])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'value', $this->value])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}

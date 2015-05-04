<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ContentFlag;

/**
 * ContentFlagSearch represents the model behind the search form about `common\models\ContentFlag`.
 */
class ContentFlagSearch extends ContentFlag
{
    public function rules()
    {
        return [
            [['id', 'name', 'description'], 'safe'],
            [['value', 'sort_num'], 'integer'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = ContentFlag::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'value' => $this->value,
            'sort_num' => $this->sort_num,
        ]);

        $query->andFilterWhere(['like', 'id', $this->id])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}

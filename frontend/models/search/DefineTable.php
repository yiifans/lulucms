<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DefineTable as DefineTableModel;

/**
 * DefineTable represents the model behind the search form about `app\models\DefineTable`.
 */
class DefineTable extends DefineTableModel
{
    public function rules()
    {
        return [
            [['name', 'name_en', 'description', 'channel_tpl', 'list_tpl', 'detail_tpl', 'back_form_tpl', 'back_action_index', 'back_action_create', 'back_action_update', 'back_action_delete', 'back_action_other', 'front_form_tpl', 'front_action_index', 'front_action_create', 'front_action_update', 'front_action_delete', 'front_action_other', 'note'], 'safe'],
            [['is_default'], 'integer'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = DefineTableModel::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'is_default' => $this->is_default,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'name_en', $this->name_en])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'channel_tpl', $this->channel_tpl])
            ->andFilterWhere(['like', 'list_tpl', $this->list_tpl])
            ->andFilterWhere(['like', 'detail_tpl', $this->detail_tpl])
            ->andFilterWhere(['like', 'back_form_tpl', $this->back_form_tpl])
            ->andFilterWhere(['like', 'back_action_index', $this->back_action_index])
            ->andFilterWhere(['like', 'back_action_create', $this->back_action_create])
            ->andFilterWhere(['like', 'back_action_update', $this->back_action_update])
            ->andFilterWhere(['like', 'back_action_delete', $this->back_action_delete])
            ->andFilterWhere(['like', 'back_action_other', $this->back_action_other])
            ->andFilterWhere(['like', 'front_form_tpl', $this->front_form_tpl])
            ->andFilterWhere(['like', 'front_action_index', $this->front_action_index])
            ->andFilterWhere(['like', 'front_action_create', $this->front_action_create])
            ->andFilterWhere(['like', 'front_action_update', $this->front_action_update])
            ->andFilterWhere(['like', 'front_action_delete', $this->front_action_delete])
            ->andFilterWhere(['like', 'front_action_other', $this->front_action_other])
            ->andFilterWhere(['like', 'note', $this->note]);

        return $dataProvider;
    }
}

<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DefineTableField;

/**
 * DefineTableFieldSearch represents the model behind the search form about `app\models\DefineTableField`.
 */
class DefineTableFieldSearch extends DefineTableField
{
    public function rules()
    {
        return [
            [['id', 'length', 'is_null', 'is_main', 'is_sys', 'sort_num', 'front_status', 'back_status'], 'integer'],
            [['table', 'name', 'name_en', 'type', 'note', 'front_fun_add', 'front_fun_update', 'front_fun_show', 'front_form_type', 'front_form_option', 'front_form_default', 'front_form_source', 'front_form_html', 'front_note', 'back_fun_add', 'back_fun_update', 'back_fun_show', 'back_form_type', 'back_form_option', 'back_form_default', 'back_form_source', 'back_form_html', 'back_note'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = DefineTableField::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'length' => $this->length,
            'is_null' => $this->is_null,
            'is_main' => $this->is_main,
            'is_sys' => $this->is_sys,
            'sort_num' => $this->sort_num,
            'front_status' => $this->front_status,
            'back_status' => $this->back_status,
        ]);

        $query->andFilterWhere(['like', 'table', $this->table])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'name_en', $this->name_en])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'note', $this->note])
            ->andFilterWhere(['like', 'front_fun_add', $this->front_fun_add])
            ->andFilterWhere(['like', 'front_fun_update', $this->front_fun_update])
            ->andFilterWhere(['like', 'front_fun_show', $this->front_fun_show])
            ->andFilterWhere(['like', 'front_form_type', $this->front_form_type])
            ->andFilterWhere(['like', 'front_form_option', $this->front_form_option])
            ->andFilterWhere(['like', 'front_form_default', $this->front_form_default])
            ->andFilterWhere(['like', 'front_form_source', $this->front_form_source])
            ->andFilterWhere(['like', 'front_form_html', $this->front_form_html])
            ->andFilterWhere(['like', 'front_note', $this->front_note])
            ->andFilterWhere(['like', 'back_fun_add', $this->back_fun_add])
            ->andFilterWhere(['like', 'back_fun_update', $this->back_fun_update])
            ->andFilterWhere(['like', 'back_fun_show', $this->back_fun_show])
            ->andFilterWhere(['like', 'back_form_type', $this->back_form_type])
            ->andFilterWhere(['like', 'back_form_option', $this->back_form_option])
            ->andFilterWhere(['like', 'back_form_default', $this->back_form_default])
            ->andFilterWhere(['like', 'back_form_source', $this->back_form_source])
            ->andFilterWhere(['like', 'back_form_html', $this->back_form_html])
            ->andFilterWhere(['like', 'back_note', $this->back_note]);

        return $dataProvider;
    }
}

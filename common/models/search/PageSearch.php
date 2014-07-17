<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Page;

/**
 * PageSearch represents the model behind the search form about `common\models\Page`.
 */
class PageSearch extends Page
{
    public function rules()
    {
        return [
            [['id', 'category_id', 'status', 'sort_num'], 'integer'],
            [['publish_time', 'modify_time', 'title', 'title_format', 'title_pic', 'summary', 'body', 'tpl', 'seo_title', 'seo_keywords', 'seo_description'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Page::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'category_id' => $this->category_id,
            'publish_time' => $this->publish_time,
            'modify_time' => $this->modify_time,
            'status' => $this->status,
            'sort_num' => $this->sort_num,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'title_format', $this->title_format])
            ->andFilterWhere(['like', 'title_pic', $this->title_pic])
            ->andFilterWhere(['like', 'summary', $this->summary])
            ->andFilterWhere(['like', 'body', $this->body])
            ->andFilterWhere(['like', 'tpl', $this->tpl])
            ->andFilterWhere(['like', 'seo_title', $this->seo_title])
            ->andFilterWhere(['like', 'seo_keywords', $this->seo_keywords])
            ->andFilterWhere(['like', 'seo_description', $this->seo_description]);

        return $dataProvider;
    }
}

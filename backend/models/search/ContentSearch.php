<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Content;

/**
 * ContentSearch represents the model behind the search form about `app\models\Content`.
 */
class ContentSearch extends Content
{
    public function rules()
    {
        return [
            [['id', 'channel_id', 'user_id', 'att1', 'att2', 'att3', 'flag', 'status'], 'integer'],
            [['user_name', 'publish_time', 'modify_time', 'title', 'title_format', 'title_pic', 'redirect_url', 'keywords', 'sub_title', 'summary', 'content', 'source'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Content::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'channel_id' => $this->channel_id,
            'user_id' => $this->user_id,
            'publish_time' => $this->publish_time,
            'modify_time' => $this->modify_time,
            'att1' => $this->att1,
            'att2' => $this->att2,
            'att3' => $this->att3,
            'flag' => $this->flag,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'user_name', $this->user_name])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'title_format', $this->title_format])
            ->andFilterWhere(['like', 'title_pic', $this->title_pic])
            ->andFilterWhere(['like', 'redirect_url', $this->redirect_url])
            ->andFilterWhere(['like', 'keywords', $this->keywords])
            ->andFilterWhere(['like', 'sub_title', $this->sub_title])
            ->andFilterWhere(['like', 'summary', $this->summary])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'source', $this->source]);

        return $dataProvider;
    }
}

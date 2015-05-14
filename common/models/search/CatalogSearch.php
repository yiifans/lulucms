<?php

namespace common\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Catalog;

/**
 * CatalogSearch represents the model behind the search form about Catalog.
 */
class CatalogSearch extends Model
{
	public $id;
	public $parent_id;
	public $name_en;
	public $name_zh;
	public $redirect_url;
	public $is_end;
	public $is_nav;
	public $sort_num;
	public $model_id;
	public $tpl_page;
	public $tpl_list;
	public $tpl_content;
	public $page_size;
	public $note;
	public $note2;

	public function rules()
	{
		return [
			[['id', 'parent_id', 'sort_num', 'model_id', 'page_size'], 'integer'],
			[['name_en', 'name_zh', 'redirect_url', 'tpl_page', 'tpl_list', 'tpl_content', 'note', 'note2'], 'safe'],
			[['is_end', 'is_nav'], 'boolean'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'parent_id' => 'Parent ID',
			'name_en' => 'Name En',
			'name_zh' => 'Name Zh',
			'redirect_url' => 'Redirect Url',
			'is_end' => 'Is End',
			'is_nav' => 'Is Nav',
			'sort_num' => 'Sort Num',
			'model_id' => 'Model ID',
			'tpl_page' => 'Tpl Page',
			'tpl_list' => 'Tpl List',
			'tpl_content' => 'Tpl Content',
			'page_size' => 'Page Size',
			'note' => 'Note',
			'note2' => 'Note2',
		];
	}

	public function search($params)
	{
		$query = Catalog::find();
		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);

		if (!($this->load($params) && $this->validate())) {
			return $dataProvider;
		}

		$this->addCondition($query, 'name_en');
		$this->addCondition($query, 'name_en', true);
		$this->addCondition($query, 'name_zh');
		$this->addCondition($query, 'name_zh', true);
		$this->addCondition($query, 'redirect_url');
		$this->addCondition($query, 'redirect_url', true);
		$this->addCondition($query, 'tpl_page');
		$this->addCondition($query, 'tpl_page', true);
		$this->addCondition($query, 'tpl_list');
		$this->addCondition($query, 'tpl_list', true);
		$this->addCondition($query, 'tpl_content');
		$this->addCondition($query, 'tpl_content', true);
		$this->addCondition($query, 'note');
		$this->addCondition($query, 'note', true);
		$this->addCondition($query, 'note2');
		$this->addCondition($query, 'note2', true);
		return $dataProvider;
	}

	protected function addCondition($query, $attribute, $partialMatch = false)
	{
		$value = $this->$attribute;
		if (trim($value) === '') {
			return;
		}
		if ($partialMatch) {
			$value = '%' . strtr($value, ['%'=>'\%', '_'=>'\_', '\\'=>'\\\\']) . '%';
			$query->andWhere(['like', $attribute, $value]);
		} else {
			$query->andWhere([$attribute => $value]);
		}
	}
}

<?php

namespace common\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\TplCoverCategory;

/**
 * TplCoverCategorySearch represents the model behind the search form about TplCoverCategory.
 */
class TplCoverCategorySearch extends Model
{
	public $id;
	public $name;
	public $note;

	public function rules()
	{
		return [
			[['id'], 'integer'],
			[['name', 'note'], 'safe'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'name' => 'Name',
			'note' => 'Note',
		];
	}

	public function search($params)
	{
		$query = TplCoverCategory::find();
		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);

		if (!($this->load($params) && $this->validate())) {
			return $dataProvider;
		}

		$this->addCondition($query, 'name');
		$this->addCondition($query, 'name', true);
		$this->addCondition($query, 'note');
		$this->addCondition($query, 'note', true);
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

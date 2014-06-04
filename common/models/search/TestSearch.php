<?php

namespace common\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Test;

/**
 * TestSearch represents the model behind the search form about Test.
 */
class TestSearch extends Model
{
	public $q;
	public $w;
	public $e;
	public $r;

	public function rules()
	{
		return [
			[['q'], 'integer'],
			[['w', 'e', 'r'], 'safe'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'q' => 'Q',
			'w' => 'W',
			'e' => 'E',
			'r' => 'R',
		];
	}

	public function search($params)
	{
		$query = Test::find();
		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);

		if (!($this->load($params) && $this->validate())) {
			return $dataProvider;
		}

		$this->addCondition($query, 'w');
		$this->addCondition($query, 'w', true);
		$this->addCondition($query, 'e');
		$this->addCondition($query, 'e', true);
		$this->addCondition($query, 'r');
		$this->addCondition($query, 'r', true);
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

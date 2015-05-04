<?php

namespace common\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\DefineTable;

/**
 * DefineTableSearch represents the model behind the search form about DefineTable.
 */
class DefineTableSearch extends Model
{
	public $id;
	public $lable;
	public $name;
	public $description;
	public $note;

	public function rules()
	{
		return [
			[['id'], 'integer'],
			[['lable', 'name', 'description', 'note'], 'safe'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'lable' => 'Lable',
			'name' => 'Name',
			'description' => 'Description',
			'note' => 'Note',
		];
	}

	public function search($params)
	{
		$query = DefineTable::find();
		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);

		if (!($this->load($params) && $this->validate())) {
			return $dataProvider;
		}

		$this->addCondition($query, 'lable');
		$this->addCondition($query, 'lable', true);
		$this->addCondition($query, 'name');
		$this->addCondition($query, 'name', true);
		$this->addCondition($query, 'description');
		$this->addCondition($query, 'description', true);
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

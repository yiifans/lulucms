<?php

namespace common\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\DefineTableField;

/**
 * DefineTableFieldSearch represents the model behind the search form about DefineTableField.
 */
class DefineTableFieldSearch extends Model
{
	public $id;
	public $table_id;
	public $lable;
	public $name;
	public $type;
	public $length;
	public $sort_num;
	public $note;

	public function rules()
	{
		return [
			[['id', 'table_id', 'length', 'sort_num'], 'integer'],
			[['lable', 'name', 'type', 'note'], 'safe'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'table_id' => 'Table ID',
			'lable' => 'Lable',
			'name' => 'Name',
			'type' => 'Type',
			'length' => 'Length',
			'sort_num' => 'Sort Num',
			'note' => 'Note',
		];
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

		$this->addCondition($query, 'lable');
		$this->addCondition($query, 'lable', true);
		$this->addCondition($query, 'name');
		$this->addCondition($query, 'name', true);
		$this->addCondition($query, 'type');
		$this->addCondition($query, 'type', true);
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

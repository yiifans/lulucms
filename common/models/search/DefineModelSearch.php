<?php

namespace common\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\DefineModel;

/**
 * DefineModelSearch represents the model behind the search form about DefineModel.
 */
class DefineModelSearch extends Model
{
	public $id;
	public $table_id;
	public $name;
	public $alias;
	public $is_enable;
	public $is_nav;
	public $sort_num;
	public $front_html;
	public $back_html;
	public $note;

	public function rules()
	{
		return [
			[['id', 'table_id', 'sort_num'], 'integer'],
			[['name', 'alias', 'front_html', 'back_html', 'note'], 'safe'],
			[['is_enable', 'is_nav'], 'boolean'],
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
			'name' => 'Name',
			'alias' => 'Alias',
			'is_enable' => 'Is Enable',
			'is_nav' => 'Is Nav',
			'sort_num' => 'Sort Num',
			'front_html' => 'Front Html',
			'back_html' => 'Back Html',
			'note' => 'Note',
		];
	}

	public function search($params)
	{
		$query = DefineModel::find();
		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);

		if (!($this->load($params) && $this->validate())) {
			return $dataProvider;
		}

		$this->addCondition($query, 'name');
		$this->addCondition($query, 'name', true);
		$this->addCondition($query, 'alias');
		$this->addCondition($query, 'alias', true);
		$this->addCondition($query, 'front_html');
		$this->addCondition($query, 'front_html', true);
		$this->addCondition($query, 'back_html');
		$this->addCondition($query, 'back_html', true);
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

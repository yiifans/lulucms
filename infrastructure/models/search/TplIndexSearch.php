<?php

namespace common\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\TplIndex;

/**
 * TplIndexSearch represents the model behind the search form about TplIndex.
 */
class TplIndexSearch extends Model
{
	public $id;
	public $name;
	public $file_path;
	public $file_name;
	public $file_content;
	public $create_time;
	public $modify_time;
	public $is_enable;
	public $note;

	public function rules()
	{
		return [
			[['id'], 'integer'],
			[['name', 'file_path', 'file_name', 'file_content', 'create_time', 'modify_time', 'note'], 'safe'],
			[['is_enable'], 'boolean'],
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
			'file_path' => 'File Path',
			'file_name' => 'File Name',
			'file_content' => 'File Content',
			'create_time' => 'Create Time',
			'modify_time' => 'Modify Time',
			'is_enable' => 'Is Enable',
			'note' => 'Note',
		];
	}

	public function search($params)
	{
		$query = TplIndex::find();
		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);

		if (!($this->load($params) && $this->validate())) {
			return $dataProvider;
		}

		$this->addCondition($query, 'name');
		$this->addCondition($query, 'name', true);
		$this->addCondition($query, 'file_path');
		$this->addCondition($query, 'file_path', true);
		$this->addCondition($query, 'file_name');
		$this->addCondition($query, 'file_name', true);
		$this->addCondition($query, 'file_content');
		$this->addCondition($query, 'file_content', true);
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

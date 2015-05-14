<?php

namespace common\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\TplForm;

/**
 * TplFormSearch represents the model behind the search form about TplForm.
 */
class TplFormSearch extends Model
{
	public $id;
	public $category_id;
	public $model_id;
	public $type;
	public $name;
	public $file_path;
	public $file_name;
	public $file_content;
	public $create_time;
	public $modify_time;
	public $note;

	public function rules()
	{
		return [
			[['id', 'category_id', 'model_id', 'type', 'file_path'], 'integer'],
			[['name', 'file_name', 'file_content', 'create_time', 'modify_time', 'note'], 'safe'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'category_id' => 'Category ID',
			'model_id' => 'Model ID',
			'type' => 'Type',
			'name' => 'Name',
			'file_path' => 'File Path',
			'file_name' => 'File Name',
			'file_content' => 'File Content',
			'create_time' => 'Create Time',
			'modify_time' => 'Modify Time',
			'note' => 'Note',
		];
	}

	public function search($params)
	{
		$query = TplForm::find();
		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);

		if (!($this->load($params) && $this->validate())) {
			return $dataProvider;
		}

		$this->addCondition($query, 'name');
		$this->addCondition($query, 'name', true);
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

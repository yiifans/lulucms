<?php

namespace common\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\DefineModelField;

/**
 * DefineModelFieldSearch represents the model behind the search form about DefineModelField.
 */
class DefineModelFieldSearch extends Model
{
	public $id;
	public $model_id;
	public $lable;
	public $name;
	public $type;
	public $length;
	public $sort_num;
	public $front_fun_add;
	public $front_fun_update;
	public $front_fun_show;
	public $front_form_type;
	public $front_form_option;
	public $front_form_default;
	public $front_form_html;
	public $back_fun_add;
	public $back_fun_update;
	public $back_fun_show;
	public $back_form_type;
	public $back_form_option;
	public $back_form_default;
	public $back_form_html;

	public function rules()
	{
		return [
			[['id', 'model_id', 'length', 'sort_num'], 'integer'],
			[['lable', 'name', 'type', 'front_fun_add', 'front_fun_update', 'front_fun_show', 'front_form_type', 'front_form_option', 'front_form_default', 'front_form_html', 'back_fun_add', 'back_fun_update', 'back_fun_show', 'back_form_type', 'back_form_option', 'back_form_default', 'back_form_html'], 'safe'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'model_id' => 'Model ID',
			'lable' => 'Lable',
			'name' => 'Name',
			'type' => 'Type',
			'length' => 'Length',
			'sort_num' => 'Sort Num',
			'front_fun_add' => 'Front Fun Add',
			'front_fun_update' => 'Front Fun Update',
			'front_fun_show' => 'Front Fun Show',
			'front_form_type' => 'Front Form Type',
			'front_form_option' => 'Front Form Option',
			'front_form_default' => 'Front Form Default',
			'front_form_html' => 'Front Form Html',
			'back_fun_add' => 'Back Fun Add',
			'back_fun_update' => 'Back Fun Update',
			'back_fun_show' => 'Back Fun Show',
			'back_form_type' => 'Back Form Type',
			'back_form_option' => 'Back Form Option',
			'back_form_default' => 'Back Form Default',
			'back_form_html' => 'Back Form Html',
		];
	}

	public function search($params)
	{
		$query = DefineModelField::find();
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
		$this->addCondition($query, 'front_fun_add');
		$this->addCondition($query, 'front_fun_add', true);
		$this->addCondition($query, 'front_fun_update');
		$this->addCondition($query, 'front_fun_update', true);
		$this->addCondition($query, 'front_fun_show');
		$this->addCondition($query, 'front_fun_show', true);
		$this->addCondition($query, 'front_form_type');
		$this->addCondition($query, 'front_form_type', true);
		$this->addCondition($query, 'front_form_option');
		$this->addCondition($query, 'front_form_option', true);
		$this->addCondition($query, 'front_form_default');
		$this->addCondition($query, 'front_form_default', true);
		$this->addCondition($query, 'front_form_html');
		$this->addCondition($query, 'front_form_html', true);
		$this->addCondition($query, 'back_fun_add');
		$this->addCondition($query, 'back_fun_add', true);
		$this->addCondition($query, 'back_fun_update');
		$this->addCondition($query, 'back_fun_update', true);
		$this->addCondition($query, 'back_fun_show');
		$this->addCondition($query, 'back_fun_show', true);
		$this->addCondition($query, 'back_form_type');
		$this->addCondition($query, 'back_form_type', true);
		$this->addCondition($query, 'back_form_option');
		$this->addCondition($query, 'back_form_option', true);
		$this->addCondition($query, 'back_form_default');
		$this->addCondition($query, 'back_form_default', true);
		$this->addCondition($query, 'back_form_html');
		$this->addCondition($query, 'back_form_html', true);
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

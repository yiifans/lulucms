<?php

namespace common\models\config;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 */
class SeoForm extends BaseForm
{
	protected $scope="seo";
	
	public $seo_title;
	public $seo_keywords;
	public $seo_description;
	

	/**
	 * @return array the validation rules.
	 */
	public function rules()
	{
		return [
			[['seo_title', 'seo_keywords'], 'string'],
			['seo_description', 'string'],
		];
	}

	public function attributeLabels()
	{
		return [
			'seo_title' => 'SEO 标题',
			'seo_keywords' => 'SEO 关键字',
			'seo_description' => 'SEO 描述',
			
			
		];
	}
}
